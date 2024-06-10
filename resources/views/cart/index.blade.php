@extends('layouts.app-customer')

@section('content')

<div class="container mt-5">
    <h1>Shopping Cart</h1>

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @php
    $totalPrice = 0;
    foreach($cartItems as $item) {
    $totalPrice += $item->price * $item->qty;
    }
    @endphp
    @if(count($cartItems) > 0)
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Gambar</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Total</th>
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td class="text-center">
                    @if($item->options->has('image'))
                    <img src="{{ asset('storage/' . $item->options->image) }}" alt="{{ $item->name }}" width="50"
                        height="50">
                    @else
                    <img src="{{ asset('images/default.png') }}" alt="Default Image" width="50" height="50">
                    @endif
                </td>
                <td class="text-center">{{ $item->name }}</td>
                <td class="text-center">{{ number_format($item->price, 2, '.', ',') }}</td>
                <td class="text-center">
                    <button class="btn btn-outline-secondary btn-sm update-cart" data-id="{{ $item->rowId }}"
                        data-action="decrease">-</button>
                    <span class="mx-2">{{ $item->qty }}</span>
                    <button class="btn btn-outline-secondary btn-sm update-cart" data-id="{{ $item->rowId }}"
                        data-action="increase">+</button>
                </td>
                <td class="text-center">{{ number_format($item->price * $item->qty, 2, '.', ',') }}</td>
                <td class="text-center">
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <div class="input-group">
            <select name="promo_id" id="promoSelect" class="form-control col-1">
                <option value="">No Promo</option>
                @foreach($promos as $promo)
                <option value="{{ $promo->id }}" data-discount="{{ $promo->discount }}">{{ $promo->nama_promo }}
                </option>
                @endforeach
            </select>
            <button type="button" id="usePromoButton" class="btn btn-primary">Gunakan Promo</button>
        </div>
        <h2>Total Akhir: Rp<span id="totalPrice">{{ number_format($totalPrice, 2, '.', ',') }}</span></h2>
    </div>
    <div class="text-end">
        <form action="{{ route('orders.create') }}" method="post" id="orderForm">
            @csrf
            <input type="hidden" name="promo_id" id="selectedPromoId" value="">
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>
    @else
    <p>Your shopping cart is empty.</p>
    @endif
</div>

<script>
document.querySelectorAll('.update-cart').forEach(button => {
    button.addEventListener('click', function() {
        var rowId = this.getAttribute('data-id');
        var action = this.getAttribute('data-action');
        console.log('Row ID:', rowId);
        console.log('Action:', action);

        fetch(`/cart/update/${rowId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    action: action
                })
            }).then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Failed to update cart: ' + data.message);
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Error updating cart');
            });
    });
});

document.getElementById('usePromoButton').addEventListener('click', function() {
    var promoSelect = document.getElementById('promoSelect');
    var selectedPromoId = promoSelect.value;
    var selectedPromoDiscount = promoSelect.options[promoSelect.selectedIndex].getAttribute(
        'data-discount');

    var totalPriceElement = document.getElementById('totalPrice');
    var totalPrice = parseFloat(totalPriceElement.innerText.replace(/,/g, ''));

    var finalPrice = totalPrice;

    if (selectedPromoDiscount) {
        finalPrice = totalPrice - (totalPrice * (parseFloat(selectedPromoDiscount) / 100));
    }

    totalPriceElement.innerText = finalPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

    document.getElementById('selectedPromoId').value = selectedPromoId;
});
</script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Mrcw6ZMFy5Tv6xfCO2UJ0dsRNyMhiwKeNWT7ClZ4l4pHylNRTQGB0t8ABRT/35jo" crossorigin="anonymous">
</script>
@endsection