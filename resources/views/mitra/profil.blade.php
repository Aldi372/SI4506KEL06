@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container mt-5">
        <div class="card card-body">
            <h2>Edit Profil Toko</h2>
            <form action="{{ route('mitra.update', $mitra->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_toko">Nama Toko:</label>
                    <input type="text" name="nama_toko" id="nama_toko" class="form-control"
                        value="{{ $mitra->nama_toko }}" required>
                </div>

                <div class="form-group">
                    <label for="no_hp_toko">No. HP Toko:</label>
                    <input type="text" name="no_hp_toko" id="no_hp_toko" class="form-control"
                        value="{{ $mitra->no_hp_toko }}" required>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $mitra->kategori }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="alamat_toko">Alamat Toko:</label>
                    <textarea name="alamat_toko" id="alamat_toko" class="form-control" rows="3"
                        required>{{ $mitra->alamat_toko }}</textarea>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('mitra.profil') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection