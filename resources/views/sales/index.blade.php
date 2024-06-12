<!-- resources/views/sales/index.blade.php -->

@extends('layouts.app-mitra')

@section('content')
<main class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4">Halaman Penjualan</h1>
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('sales') }}">
                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 col-form-label">Pilih Tanggal:</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="date" name="date" value="{{ $date }}">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                        <p>Total penjualan pada tanggal {{ $date }}: Rp {{ number_format($totalSales, 2) }}</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Menu</th>
                                        <th scope="col">Jumlah Pesanan</th>
                                        <th scope="col">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $order->menu->nama_menu }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>Rp {{ number_format($order->total_price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection