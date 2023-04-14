<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        // $date_now = Carbon::now()->toDateString();
        $rentlogs = RentLogs::with(['user', 'book'])->orderByDesc('id')->get();
        return view('rentlog.rent_log', compact('rentlogs'));
    }
}
