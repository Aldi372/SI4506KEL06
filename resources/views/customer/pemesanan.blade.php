@extends('layout.app-customer')

@section
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-5 card card-body">
            <h1>Order History</h1>

            @if(count($orders) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Gambar Menu</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->menu->nama_menu }}</td>
                        <td>
                            <img src="{{ asset($order->menu->gambar_menu) }}" alt="Menu Image" width="50" height="50">
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->total_price, 2, '.', ',') }}</td>
                        <td>{{ $order->status }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No order history available.</p>
            @endif
        </div>
    </div>
</main>   
<div class="container mt-5">

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-9aR5l+95HXYrlJICRlxSz/3YUKx4l/6yI0jIj6U2b+JhxEzQ/SFIlXffFm2aFNL" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-XVZt++rTn3Bv21t0RxL4DXL4z5UtdiJrI95LKXqFh5Y32MPY1az7kFgP2RbFAQ5W" crossorigin="anonymous">
</script>

</body>

@endsection