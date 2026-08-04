<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Toko Bangunan Jaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            padding:0;
            background:#f5f7fb;
            overflow-x:hidden;
        }

        .sidebar{
            position:fixed;
            top:0;
            left:0;
            width:240px;
            height:100vh;
            background:#0d6efd;
            color:white;
        }

        .sidebar h3{
            text-align:center;
            padding:20px;
            margin:0;
            border-bottom:1px solid rgba(255,255,255,.2);
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:15px 20px;
            transition:.3s;
        }

        .sidebar a:hover{
            background:white;
            color:#0d6efd;
        }

        .content{
            margin-left:240px;
            min-height:100vh;
        }

        .navbar{
            background:white;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
            padding:15px;
        }

        .card{
            border:none;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        footer{
            text-align:center;
            color:gray;
            padding:20px;
        }

        .logout{
            position:absolute;
            bottom:20px;
            width:100%;
        }

        .logout button{
            width:85%;
            margin-left:18px;
        }
    </style>

</head>

<body>

<div class="sidebar">

    <h3>
        <i class="bi bi-hammer"></i>
        TOKO BANGUNAN
    </h3>

    {{-- MENU ADMIN --}}
    @if(Auth::user()->role == 'admin')

        <a href="/dashboard">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="/barang">
            <i class="bi bi-box-seam"></i>
            Data Barang
        </a>

        <a href="/admin/permintaan">
            <i class="bi bi-clipboard-check"></i>
            Permintaan Barang
        </a>

    @endif


    {{-- MENU USER --}}
    @if(Auth::user()->role == 'user')

        <a href="/user/dashboard">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('user.barang') }}">
            <i class="bi bi-box"></i>
            Daftar Barang
        </a>

        <a href="{{ route('permintaan.riwayat') }}">
            <i class="bi bi-clock-history"></i>
            Riwayat Permintaan
        </a>

    @endif


    <div class="logout">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>

        </form>

    </div>

</div>

<div class="content">

    <nav class="navbar">

        <div class="container-fluid">

            <h4 class="mb-0">

                Sistem Inventaris Toko Bangunan

            </h4>

            <div>

                Login sebagai :

                <strong>

                    {{ Auth::user()->name }}

                    ({{ ucfirst(Auth::user()->role) }})

                </strong>

            </div>

        </div>

    </nav>

    <div class="container mt-4">

        @yield('content')

    </div>

    <footer>

        <hr>

        © 2026 Sistem Inventaris Toko Bangunan

    </footer>

</div>

</body>

</html>