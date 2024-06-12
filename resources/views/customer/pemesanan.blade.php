@extends('layouts.app-customer')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title mb-0">Notifikasi</h1>
                </div>
                <div class="card-body">
                    @if(count($orders) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Gambar Menu</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->menu->nama_menu }}</td>
                                <td>
                                    <img src="{{ asset($order->menu->gambar_menu) }}" alt="Menu Image"
                                        class="img-thumbnail" width="50" height="50">
                                </td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ number_format($order->total_price, 2, '.', ',') }}</td>
                                <td>
                                    @if($order->status === 'Pesanan Belum Diterima')
                                    <button type="button" class="btn btn-sm btn-warning">Pesanan Belum Diterima</button>
                                    @elseif($order->status === 'Pesanan Sedang Dipersiapkan')
                                    <button type="button" class="btn btn-sm btn-info">Pesanan Sedang
                                        Dipersiapkan</button>
                                    @elseif($order->status === 'Pesanan Siap')
                                    <button type="button" class="btn btn-sm btn-success">Pesanan Siap</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger">Cancelled</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No order history available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection