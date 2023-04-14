<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ePerpus | Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css
    ">
</head>

<body class="bg-light pt-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-md-6 p-5">
                <h1 class="fw-bold">Registrasi <span class="text-primary">ePerpus.</span></h1>
            </div>
            <div class="col-12 col-md-6 bg-white shadow-sm p-5 rounded-3">

                <div class="">
                    @if($errors->any())
                    <div class="alert alert-danger" style="width:500px; margin-top:20px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('status'))
                    <div class="alert alert-{{ session('status') }}" style="width:500px;">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div>
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>
                        <div>
                            <label for="address" class="form-label">Alamat</label>
                            <textarea type="text" name="address" class="form-control" id="address" rows="2"></textarea>
                        </div><br>
                        <div>
                            <button type="submit" class="btn btn-primary form-control">Konfirmasi</button>
                        </div>
                        <div class="text-center">
                            Sudah Memiliki Akun? <a href="/login">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js
"></script>
</body>

</html>