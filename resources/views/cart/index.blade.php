<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Coffside Web</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ecede8;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo-1.png') }}" alt="Coffside Logo" width="80" height="40">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('customer.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('promo_customer') }}">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('menu_customer') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            Keranjang
                            <span>
                                {{ Cart::count() }}
                            </span>
                        </a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ url('/customer/orders')}}">Data Pemesanan</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Shopping Cart</h1>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(count($cartItems) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Promo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price, 2, '.', ',') }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->price * $item->qty, 2, '.', ',') }}</td>
                    <td>
                        <div class="input-group">
                            <select name="promo_id" class="form-control col-1">
                                <option value="">No Promo</option>
                                @foreach($promos as $promo)
                                <option value="{{ $promo->id }}">{{ $promo->nama_promo }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="usePromoButton" class="btn btn-primary">Gunakan Promo</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('orders.create') }}" method="post" id="orderForm">
            @csrf
            <input type="hidden" name="promo_id" id="selectedPromoId" value="">
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>

        @else
        <p>Your shopping cart is empty.</p>
        @endif
    </div>

    <script>
    document.getElementById('usePromoButton').addEventListener('click', function() {
        var promoSelect = document.querySelector('select[name="promo_id"]');
        var selectedPromoId = promoSelect.value;


        document.getElementById('selectedPromoId').value = selectedPromoId;


        alert('Berhasil Menggunakan Promo');
    });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-9aR5l+95HXYrlJICRlxSz/3YUKx4l/6yI0jIj6U2b+JhxEzQ/SFIlXffFm2aFNL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-XVZt++rTn3Bv21t0RxL4DXL4z5UtdiJrI95LKXqFh5Y32MPY1az7kFgP2RbFAQ5W" crossorigin="anonymous">
    </script>
</body>

</html>