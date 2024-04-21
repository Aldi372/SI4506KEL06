<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Rescue</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body style="background-color: #377E4E">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Mitra</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('registration.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    @if ($errors->has('email'))
                                        <label for="email" class="font-weight-bold text-danger">Alamat Email * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="email" class="font-weight-bold">Alamat Email *</label>
                                    @endif
                                    <input type="email" class="form-control form-control-user" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('nama_bisnis'))
                                        <label for="nama-bisnis" class="font-weight-bold text-danger">Nama Bisnis * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="nama-bisnis" class="font-weight-bold">Nama Bisnis *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="nama-bisnis" name="nama_bisnis">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('nama_akun_medsos'))
                                        <label for="nama-akun-medsos" class="font-weight-bold text-danger">Nama Akun Media Sosial Bisnis * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="nama-akun-medsos" class="font-weight-bold">Nama Akun Media Sosial Bisnis *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="nama-akun-medsos" name="nama_akun_medsos">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('kategori_menu'))
                                        <label for="" class="font-weight-bold text-danger">Kategori Menu * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="" class="font-weight-bold">Kategori Menu *</label>
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-1" value="Roti/Kue">
                                        <label class="form-check-label" for="kategori-menu-1">
                                            Roti/Kue
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-2" value="Sayuran/Buah">
                                        <label class="form-check-label" for="kategori-menu-2">
                                            Sayuran/Buah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-3" value="Bahan Makanan">
                                        <label class="form-check-label" for="kategori-menu-3">
                                            Bahan Makanan (Contoh : Frozen)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-4" value="Makanan Sehat/Salad">
                                        <label class="form-check-label" for="kategori-menu-4">
                                            Makanan Sehat/Salad
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-5" value="Minuman">
                                        <label class="form-check-label" for="kategori-menu-5">
                                            Minuman
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-6" value="Makanan Ringan/Cemilan">
                                        <label class="form-check-label" for="kategori-menu-6">
                                            Makanan Ringan/Cemilan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-7" value="Makanan Berat">
                                        <label class="form-check-label" for="kategori-menu-7">
                                            Makanan Berat (Contoh : Aneka Nasi)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_menu" id="kategori-menu-8" value="other">
                                        <label class="form-check-label" for="kategori-menu-8">
                                            Yang Lain :
                                        </label>
                                        <input type="text" class="form-control" name="kategori_menu_lain" id="kategori-menu-8-text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('kategori_usaha'))
                                        <label for="" class="font-weight-bold text-danger">Kategori Usaha * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="" class="font-weight-bold">Kategori Usaha *</label>
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_usaha" id="kategori-usaha-1" value="Restoran">
                                        <label class="form-check-label" for="kategori-usaha-1">
                                            Restoran
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_usaha" id="kategori-usaha-2" value="Hotel">
                                        <label class="form-check-label" for="kategori-usaha-2">
                                            Hotel
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_usaha" id="kategori-usaha-3" value="Supermarket">
                                        <label class="form-check-label" for="kategori-usaha-3">
                                            Supermarket
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_usaha" id="kategori-usaha-4" value="Produksi Rumahan">
                                        <label class="form-check-label" for="kategori-usaha-4">
                                            Produksi Rumahan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_usaha" id="kategori-usaha-5" value="Cake and Bakery">
                                        <label class="form-check-label" for="kategori-usaha-5">
                                            Cake and Bakery
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_usaha" id="kategori-usaha-6" value="Warung Makan">
                                        <label class="form-check-label" for="kategori-usaha-6">
                                            Warung Makan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori_usaha" id="kategori-usaha-7" value="Cafe and Coffe Shop">
                                        <label class="form-check-label" for="kategori-usaha-7">
                                            Cafe and Coffe Shop
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('jumlah_pegawai'))
                                        <label for="" class="font-weight-bold text-danger">Jumlah Pegawai/Pekerja * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="" class="font-weight-bold">Jumlah Pegawai/Pekerja *</label>
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pegawai" id="jumlah-pegawai-1" value="1 - 5 Pegawai">
                                        <label class="form-check-label" for="jumlah-pegawai-1">
                                            1 - 5 Pegawai
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pegawai" id="jumlah-pegawai-2" value="5 - 10 Pegawai">
                                        <label class="form-check-label" for="jumlah-pegawai-2">
                                            5 - 10 Pegawai
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pegawai" id="jumlah-pegawai-3" value="10 - 15 Pegawai">
                                        <label class="form-check-label" for="jumlah-pegawai-3">
                                            10 - 15 Pegawai
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pegawai" id="jumlah-pegawai-4" value="Lebih dari 15 Pegawai">
                                        <label class="form-check-label" for="jumlah-pegawai-4">
                                            Lebih dari 15 Pegawai
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('jumlah_pendapatan'))
                                        <label for="" class="font-weight-bold text-danger">Jumlah Pendapatan Perbulan * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="" class="font-weight-bold">Jumlah Pendapatan Perbulan *</label>
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pendapatan" id="jumlah-pendapatan-1" value="1 - 5 Juta">
                                        <label class="form-check-label" for="jumlah-pendapatan-1">
                                            1 - 5 Juta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pendapatan" id="jumlah-pendapatan-2" value="5 - 15 Juta">
                                        <label class="form-check-label" for="jumlah-pendapatan-2">
                                            5 - 15 Juta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pendapatan" id="jumlah-pendapatan-3" value="15 - 25 Juta">
                                        <label class="form-check-label" for="jumlah-pendapatan-3">
                                            15 - 25 Juta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pendapatan" id="jumlah-pendapatan-4" value="25 - 50 Juta">
                                        <label class="form-check-label" for="jumlah-pendapatan-4">
                                            25 - 50 Juta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jumlah_pendapatan" id="jumlah-pendapatan-5" value="Lebih dari 50 Juta">
                                        <label class="form-check-label" for="jumlah-pendapatan-5">
                                            Lebih dari 50 Juta
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Apakah usaha kamu memiliki Toko/Outlet Permanen?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="toko_permanen" id="toko-permanen-1" value="Ya">
                                        <label class="form-check-label" for="toko-permanen-1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="toko_permanen" id="toko-permanen-2" value="Tidak">
                                        <label class="form-check-label" for="toko-permanen-2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('alamat_usaha'))
                                        <label for="alamat-usaha" class="font-weight-bold text-danger">Alamat Usaha (Alamat yang sesuai pada google map) * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="alamat-usaha" class="font-weight-bold">Alamat Usaha (Alamat yang sesuai pada google map) *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="alamat-usaha" name="alamat_usaha">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('kota'))
                                        <label for="kota" class="font-weight-bold text-danger">Kota/Kabupaten * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="kota" class="font-weight-bold">Kota/Kabupaten *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="kota" name="kota">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('kecamatan'))
                                        <label for="kecamatan" class="font-weight-bold text-danger">Kecamatan * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="kecamatan" class="font-weight-bold">Kecamatan *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="kecamatan" name="kecamatan">
                                </div>
                                <div class="form-group">
                                    <label for="kartu-identitas" class="font-weight-bold">Foto Kartu Identitas (KTP/SIM)</label>
                                    <input type="file" accept="image/*" class="form-control-file" id="kartu-identitas" name="kartu_identitas">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('nomor_pemilik_usaha'))
                                        <label for="nomor-pemilik-usaha" class="font-weight-bold text-danger">Nama & No. Whatsapp Pemilik Usaha (Contoh : Naufal 0812341234) * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="nomor-pemilik-usaha" class="font-weight-bold">Nama & No. Whatsapp Pemilik Usaha (Contoh : Naufal 0812341234) *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="nomor-pemilik-usaha" name="nomor_pemilik_usaha">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('nomor_admin'))
                                        <label for="nomor-admin" class="font-weight-bold text-danger">Nama & No. Whatsapp yang dapat dihubungi/Admin (Contoh : Naufal 0812341234) * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="nomor-admin" class="font-weight-bold">Nama & No. Whatsapp yang dapat dihubungi/Admin (Contoh : Naufal 0812341234) *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="nomor-admin" name="nomor_admin">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('bank'))
                                        <label for="bank" class="font-weight-bold text-danger">Rincian Perbankan (Contoh : Atika Pohan/BCA/123456789) setiap transaksi akan dikirimkan melalui akun rekening ini akan dikenakan biaya beda Bank apabila bukan BCA * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="bank" class="font-weight-bold">Rincian Perbankan (Contoh : Atika Pohan/BCA/123456789) setiap transaksi akan dikirimkan melalui akun rekening ini akan dikenakan biaya beda Bank apabila bukan BCA *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="bank" name="bank">
                                </div>
                                <div class="form-group">
                                    <label for="logo-toko" class="font-weight-bold">Logo Toko Anda (Jika ada)</label>
                                    <input type="file" accept="image/*" class="form-control-file" id="logo-toko" name="logo_toko">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('nama_menu'))
                                        <label for="nama-menu" class="font-weight-bold text-danger">Input Menu Pertamamu (Nama Menu) * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="nama-menu" class="font-weight-bold">Input Menu Pertamamu (Nama Menu) *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="nama-menu" name="nama_menu">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('deskripsi_menu'))
                                        <label for="deskripsi-menu" class="font-weight-bold text-danger">Input Menu Pertamamu (Deskripsi Menu) * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="deskripsi-menu" class="font-weight-bold">Input Menu Pertamamu (Deskripsi Menu) *</label>
                                    @endif
                                    <input type="text" class="form-control form-control-user" id="deskripsi-menu" name="deskripsi_menu">
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="font-weight-bold">Input Harga Normal/Harga Asli Menu Pertamamu (Harga Normal akan otomatis terdiskon 50%)</label>
                                    <input type="number" class="form-control form-control-user" id="harga" name="harga">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('foto_produk'))
                                        <label for="foto-produk" class="font-weight-bold text-danger">Foto Produk untuk Menu Pertamamu * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="foto-produk" class="font-weight-bold">Foto Produk untuk Menu Pertamamu *</label>
                                    @endif
                                    <input type="file" accept="image/*" class="form-control-file" id="foto-produk" name="foto_produk">
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('know_from'))
                                        <label for="" class="font-weight-bold text-danger">Dari mana kamu mengetahui Aplikasi Food Rescue - Partner? * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="" class="font-weight-bold">Dari mana kamu mengetahui Aplikasi Food Rescue - Partner? *</label>
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-1" value="Dihubungi oleh Tim Food Rescue">
                                        <label class="form-check-label" for="know-from-1">
                                            Dihubungi oleh Tim Food Rescue
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-2" value="Konten Instagram">
                                        <label class="form-check-label" for="know-from-2">
                                            Konten Instagram
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-3" value="Iklan Instagram">
                                        <label class="form-check-label" for="know-from-3">
                                            Iklan Instagram
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-4" value="Rekan Usaha">
                                        <label class="form-check-label" for="know-from-4">
                                            Rekan Usaha
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-5" value="Youtube">
                                        <label class="form-check-label" for="know-from-5">
                                            Youtube
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-6" value="Playstore">
                                        <label class="form-check-label" for="know-from-6">
                                            Playstore
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-7" value="Website Food Rescue">
                                        <label class="form-check-label" for="know-from-7">
                                            Website Food Rescue
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-8" value="Tiktok">
                                        <label class="form-check-label" for="know-from-8">
                                            Tiktok
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-9" value="Twitter">
                                        <label class="form-check-label" for="know-from-9">
                                            Twitter
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="know_from" id="know-from-10" value="Portal Berita">
                                        <label class="form-check-label" for="know-from-10">
                                            Portal Berita
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('toko_cabang'))
                                        <label for="" class="font-weight-bold text-danger">Apakah toko kamu memiliki beberapa cabang? * (Pertanyaan ini wajib diisi)</label>
                                    @else
                                        <label for="" class="font-weight-bold">Apakah toko kamu memiliki beberapa cabang? *</label>
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="toko_cabang" id="toko-cabang-1" value="Ya">
                                        <label class="form-check-label" for="toko-cabang-1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="toko_cabang" id="toko-cabang-2" value="Tidak">
                                        <label class="form-check-label" for="toko-cabang-2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #377E4E; border-color: #377E4E">
                                    Daftar
                                </button>
                            </form>
                            <hr>
                            <div class="text-start">
                                <a class="small" href="#">* Pertanyaan yang wajib diisi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script>
        $('#kategori-menu-8').on('click', function () {
            $('#kategori-menu-8-text').focus()
        })

        $('#kategori-menu-8-text').on('click', function () {
            $('#kategori-menu-8').click()
        })
    </script>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "Permintaanmu berhasil dikirim",
                icon: "success"
            });
        </script>
    @endif

    @if (session()->has('errors'))
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "Ada pertanyaan yang belum kamu isi",
                icon: "error"
            });
        </script>
    @endif
</body>

</html>