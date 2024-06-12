@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">


        <div class="container mt-4 card card-body">
            <h4>Tambah Menu</h4>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_menu">Nama Menu:</label>
                    <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                </div><br>
                <div class="form-group">
                    <label for="nama_toko">Nama Toko</label>
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko"
                        value="{{ $mitra->nama_toko }}" readonly>
                </div><br>
                <div class="form-group">
                    <label for="kategori_menu">Kategori Menu:</label>
                    <select class="form-control" id="kategori_menu" name="kategori_menu" required>
                        <option value="Food">Food</option>
                        <option value="Drink">Drink</option>
                        <option value="Snack">Snack</option>
                        <option value="Snack">Dessert</option>
                    </select>
                </div><br>
                <br>
                <div class="form-group">
                    <label for="gambar_menu">Gambar Menu:</label><br>
                    <input type="file" class="form-control-file" id="gambar_menu" name="gambar_menu" accept="image/*"
                        required>
                </div><br>
                <div class="form-group">
                    <label for="harga_menu">Harga Menu:</label>
                    <input type="number" class="form-control" id="harga_menu" name="harga_menu" required>
                </div><br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <!-- Table Element -->
    </div>
</main>
@endsection