@extends('layouts.app-home')

@section('content')
<section class="header-main border-bottom bg-white">
    <div class="container-fluid">
        <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form action="{{ route('customer.menu') }}" method="GET">
                    <div class="d-flex form-inputs">
                        <input class="form-control" type="text" name="search" placeholder="Search any product..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn"><i class="bx bx-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-md-2">
                <div class="d-flex d-none d-md-flex flex-row align-items-center">
                    <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container" id="coffee">
    <div class="row my-4">
        <div class="col-12">
            <form action="{{ route('customer.menu') }}" method="GET">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <option value="Food" {{ request('category') == 'Food' ? 'selected' : '' }}>Food</option>
                    <option value="Drink" {{ request('category') == 'Drink' ? 'selected' : '' }}>Drink</option>
                    <option value="Snack" {{ request('category') == 'Snack' ? 'selected' : '' }}>Snack</option>
                    <option value="Dessert" {{ request('category') == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                </select>
            </form>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        @foreach($menus as $menu)
        <div class="col-md-3 py-0 py-md-0">
            <div class="card border-0">
                <img src="{{ asset($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" class="img-thumbnail">
                <div class="card-body">
                    <h3 class="menu-coffee">{{ $menu->nama_menu }}</h3>
                    <h5 class="menu-coffee">{{ $menu->nama_toko }}</h5>
                    <h5 class="menu-coffee">{{ 'Rp ' . number_format($menu->harga_menu, 0, ',', '.') }}
                        <span></span>
                    </h5>
                    <div class="d-flex justify-content-between align-items-center">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection