@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-4 card card-body">
            <h2>Daftar Menu</h2>

            <div class="mb-5 text-end">
                <a href="{{ route('menus.create') }}" class="btn btn-success ">Tambah Menu</a>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->kategori_menu }}</td>
                        <td>
                            <img src="{{ asset($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}"
                                style="max-width: 100px;">
                        </td>
                        <td>{{ 'Rp ' . number_format($menu->harga_menu, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                @if($menus->previousPageUrl())
                <a href="{{ $menus->previousPageUrl() }}" class="btn btn-primary">Previous</a>
                @endif

                @if($menus->nextPageUrl())
                <a href="{{ $menus->nextPageUrl() }}" class="btn btn-primary">Next</a>
                @endif
            </div>
        </div>
        <!-- Table Element -->
    </div>
</main>
@endsection