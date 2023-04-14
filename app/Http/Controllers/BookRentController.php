<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('books.book-rent', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');
        if ($book['status'] != 1) {
            Session::flash('message', 'Gagal! Buku tidak tersedia');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/book-rent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', 'Gagal! User sudah mencapai batas peminjaman');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    RentLogs::create($request->all());
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 0;
                    $book->save();
                    DB::commit();

                    Session::flash('message1', 'Buku berhasil dipinjamkan!');
                    Session::flash('message2', 'Tanggal Peminjaman : ' . $request['rent_date']);
                    Session::flash('message3', 'Batas Pengembalian : ' . $request['return_date']);
                    Session::flash('alert-class', 'alert-success');
                    return redirect('/book-rent');
                } catch (\Throwable $th) {
                    DB::rollback();
                    dd($th);
                }
            }
        }
    }

    public function update($slug, Request $request)
    {

        $rent = RentLogs::where('id', $slug)->first();
        $book = Book::where('id', $rent['book_id'])->first();

        $date_now = Carbon::now()->toDateString();
        $rent_date = $rent['rent_date'];
        $return_date = $rent['return_date'];

        $rent->update(['actual_return_date' => $date_now]);
        $book->update(['status' => true]);

        $penaltyCost = $this->penaltyCost($return_date);
        Session::flash('message', 'Buku berhasil dikembalikan!');
        Session::flash('book', 'Nama Buku : ' . $book['title'] . ' (' . $book['book_code'] . ')');
        Session::flash('rent_date', 'Tanggal Peminjaman : ' . $rent_date);
        Session::flash('return_date', 'Batas Pengembalian : ' . $return_date);
        Session::flash('date_now', 'Dikembalikan Pada : ' . $date_now);
        Session::flash('penalty', 'Denda : Rp' . ((int)$penaltyCost));
        Session::flash('penalty_status', ($penaltyCost > 0 ? 'text-danger fw-bold' : ''));
        Session::flash('alert-class', 'alert-success');

        // return redirect('rent_logs.index')->with('status', 'Buku berhasil diedit');
        return redirect('/rent-logs');
    }
    public function penaltyCost($return_date)
    {

        $date_now = Carbon::now()->toDateString();
        if ($date_now > $return_date) {
            $toDate = Carbon::parse($return_date);
            $fromDate = Carbon::parse($date_now);

            $days = $toDate->diffInDays($fromDate);
            return $days * 5000;
        }
        return 0;
    }
}
