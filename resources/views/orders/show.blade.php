@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-5">
            <h2>Show Order</h2>
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>ID:</td>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <td>Menu:</td>
                                <td>{{ $order->menu->nama_menu }}</td>
                            </tr>
                            <tr>
                                <td>Promo:</td>
                                <td>{{ $order->promo ? $order->promo->nama_promo : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pemesan:</td>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah:</td>
                                <td>{{ $order->quantity }}</td>
                            </tr>
                            <tr>
                                <td>Total Price:</td>
                                <td>{{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection