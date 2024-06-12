@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-4 card card-body">
            <h2>Daftar Stocks</h2>
            <div class="mb-5 text-end">
                <a href="{{ route('stocks.create') }}" class="btn btn-success">Tambah Stock Menu Baru</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Gambar</th>
                        <th>Jumlah Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $stock->menu->nama_menu }}</strong><br>
                        </td>
                        <td>
                            <img src="{{ asset($stock->menu->gambar_menu) }}" alt="{{ $stock->menu->nama_menu }}"
                                style="max-width: 100px;">
                        </td>
                        <td>{{ $stock->quantity }}</td>
                        <td>
                            <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning">Tambah
                                Stock</a>
                            <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus stok ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                @if($stocks->previousPageUrl())
                <a href="{{ $stocks->previousPageUrl() }}" class="btn btn-primary">Previous</a>
                @endif

                @if($stocks->nextPageUrl())
                <a href="{{ $stocks->nextPageUrl() }}" class="btn btn-primary">Next</a>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection