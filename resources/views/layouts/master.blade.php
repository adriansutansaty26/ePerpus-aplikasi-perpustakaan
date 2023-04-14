<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ePerpus | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('css')
</head>

<body>
    <div class="main d-flex justify-content-between flex-column">

        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <i class="bi bi-journal-bookmark"></i>&nbsp;ePerpus </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#button-primary" aria-controls="button-primary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="bg-dark col-lg-2 collapse d-lg-block" id="button-primary">
                    @if(Auth::user())
                    <p class="text-light d-block text-light px-3 py-2 bg-secondary m-3 my-2 rounded"><small><i class="bi bi-person-fill"></i> {{ auth()->user()->username }}</small></p>
                    @if(Auth::user()->role_id == 1)
                    <a href="/dashboard" class="{{ (request()->is('dashboard') ? 'active' : '') }} d-block px-3 py-2 text-light">Dashboard</a>
                    <a href="{{ route('book-rent.index') }}" class="{{ (request()->is('book-rent*') ? 'active' : '') }} d-block text-light px-3 py-2">Catat Peminjaman</a>
                    <a href="{{ route('rent_logs.index') }}" class="{{ (request()->is('rent-logs*') ? 'active' : '') }} d-block text-light px-3 py-2">Log Peminjaman</a>
                    <a class="{{ (request()->is('books') || request()->is('categories') ? 'active' : '') }} d-block px-3 py-2 text-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Manajemen Buku
                    </a>
                    <div class="collapse px-3 py-2" id="collapseExample">
                        <ul class="list-group">
                            <a href="{{ route('books.index') }}">
                                <li class="list-group-item bg-dark border-0 text-light"><i class="bi bi-chevron-right"></i> Atur Buku</li>
                            </a>
                            <a href="{{ route('category.index') }}">
                                <li class="list-group-item bg-dark border-0 text-light"><i class="bi bi-chevron-right"></i> Atur Kategori</li>
                            </a>
                        </ul>
                    </div>
                    <a href="{{ route('users.index') }}" class="{{ (request()->is('users*') ? 'active' : '') }} d-block text-light px-3 py-2">Manajemen User</a>
                    @else
                    <a href="profile" class="{{ (request()->route()->uri == 'profile') ? 'active' : '' }} d-block text-light px-3 py-2">Profil</a>
                    <a href="buku-list" class="{{ (request()->route()->uri == 'buku-list') ? 'active' : '' }} d-block text-light px-3 py-2">Daftar Buku</a>
                    @endif
                    <a href="/logout" class="d-block text-light px-3 py-2">Logout</a>
                    @else
                    <a href="/login">Login</a>
                    @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    @stack('script')
</body>

</html>