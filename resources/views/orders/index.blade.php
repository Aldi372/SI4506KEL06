@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-5 card card-body">
            <h2>Data Pemesanan</h2>
            @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Promo</th>
                        <th>Nama Pemesan</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->menu->nama_menu }}</td>
                        <td>{{ $order->promo ? $order->promo->nama_promo : 'No Promo' }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                            <!-- <form action="{{ route('orders.destroy', $order->id) }}" method="post"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                            </form> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {!! $orders->links() !!}
            </div>

        </div>
    </div>
</main>
@endsection