@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container mt-4 card card-body">
        <h2>Edit Menu</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group"><br>
                <label for="nama_menu">Nama Menu:</label><br>
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $menu->nama_menu }}"
                    required>
            </div><br>
            <div class="form-group"><br>
                <label for="nama_toko">Nama Menu:</label><br>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ $menu->nama_toko }}"
                    readonly>
            </div><br>
            <div class="form-group">
                <label for="kategori_menu">Kategori Menu:</label><br>
                <select class="form-control" id="kategori_menu" name="kategori_menu" required>
                    <option value="Food" {{ $menu->kategori_menu === 'Food' ? 'selected' : '' }}>Food
                    </option>
                    <option value="Drink" {{ $menu->kategori_menu === 'Drink' ? 'selected' : '' }}>Drink
                    </option>
                    <option value="Snack" {{ $menu->kategori_menu === 'Snack' ? 'selected' : '' }}>Snack
                    </option>
                    <option value="Dessert" {{ $menu->kategori_menu === 'Dessert' ? 'selected' : '' }}>Dessert
                    </option>
                </select>
            </div><br>

            <div class="form-group">
                <label for="gambar_menu">Gambar Menu:</label><br>
                <input type="file" class="form-control-file" id="gambar_menu" name="gambar_menu" accept="image/*">
            </div><br>
            <div class="form-group">
                <label for="harga_menu">Harga Menu:</label><br>
                <input type="number" class="form-control" id="harga_menu" name="harga_menu"
                    value="{{ $menu->harga_menu }}" required>
            </div><br>
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</main>
@endsection