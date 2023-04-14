<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css
    ">
    <title>ePerpus | Login</title>
</head>

<body class="bg-light pt-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-md-6 p-5">
                <h1 class="fw-bold">Selamat Datang di <span class="text-primary">ePerpus.</span></h1>
            </div>
            <div class="col-12 col-md-6 bg-white shadow-sm p-5 rounded-3">

                <div class="">
                    @if (session('status'))
                    <div class="alert alert-{{ session('status') }}">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form action="login" method="post">
                        @csrf
                        <h3>Login</h3>
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div><br>
                        <div>
                            <button type="submit" class="btn btn-primary form-control">Login</button>
                        </div><br>
                        <div class="text-center">
                            Belum punya akun? <a href="/register">Registrasi</a>
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