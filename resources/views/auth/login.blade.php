<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .login-box{
            width:400px;
            margin:80px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,.2);
        }
    </style>

</head>
<body>

<div class="login-box">

<h3 class="text-center mb-4">
Inventaris Toko Bangunan
</h3>

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<form action="{{ route('login.proses') }}" method="POST">

@csrf

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button class="btn btn-primary w-100">

Login

</button>

</form>

</div>

</body>
</html>