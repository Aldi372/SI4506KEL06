<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cek Data Mitra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('admin_assets2/css/style.css') }}" />
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Admin Dashboard</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Navigation Sidebar</li>
                    <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="{{ url('dashboard') }}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url('verifikasi_mitra')}}" class="sidebar-link">
                            <i class="fa-solid fa-comment-dollar pe-2"></i>
                            Verifikasi Mitra
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('data_customer')}}" class="sidebar-link">
                            <i class="fa-solid fa-user pe-2"></i>
                            Data Akun Customer
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('daftar-toko')}}" class="sidebar-link">
                            <i class="fa-solid fa-comment-dollar pe-2"></i>
                            Data Akun Toko
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('promos') }}" class="sidebar-link">
                            <i class="fa-solid fa-comment-dollar pe-2"></i>
                            Promo
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ asset('images/profile.jpg') }}" class="avatar img-fluid rounded" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container mt-5">
                    <div class="container mt-5 card card-body">
                        <h1>Lihat Data Verifikasi Mitra</h1>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Toko</th>
                                <td>{{ $mitras->nama_toko }}</td>
                            </tr>
                            <tr>
                                <th>Kontak Yang Dapat Dihubungi</th>
                                <td>{{ $mitras->no_hp_toko }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pemilik</th>
                                <td>{{ $mitras->name }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Usaha</th>
                                <td>{{ $mitras->kategori }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Toko</th>
                                <td>{{ $mitras->alamat_toko }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{ route('mitra.accept', $mitras->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Terima Mitra</button>
                    </form>
                </div>
            </main>

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Coffside</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin_assets2/js/script.js')}}"></script>
</body>

</html>