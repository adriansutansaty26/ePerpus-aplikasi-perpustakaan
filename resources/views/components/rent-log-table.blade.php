<div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Batas Pengembalian</th>
                <th>Dikembalikan Pada</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item)
            <tr class="<?= (date('Y-m-d', time()) > $item->return_date) ? 'bg-danger' : 'bg-light' ?>">
                <td>{{ $item->id }}</td>
                <td class="fw-bold">{{ $item->user->username }}</td>
                <td>{{ $item->book->title }}</td>
                <td>{{ $item->rent_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->actual_return_date }}</td>
                <?php if ($item->actual_return_date != null) { ?>
                    <td class="fw-bold">Selesai</td>
                    <td>
                    </td>
                <?php } else if (date('Y-m-d', time()) > $item->return_date) { ?>
                    <td class="fw-bold">Terlambat</td>
                    <td>
                        <form action="{{ route('book-rent.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <button class="btn btn-dark"><i class="bi bi-arrow-clockwise"></i> Catat Pengembalian </button>
                        </form>
                    </td>
                <?php } else if (date('Y-m-d', time()) < $item->return_date) { ?>
                    <td class="fw-bold">Meminjam</td>
                    <td>
                        <form action="{{ route('book-rent.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <button class="btn btn-dark"><i class="bi bi-arrow-clockwise"></i> Catat Pengembalian </button>
                        </form>
                    </td>
                <?php } ?>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>