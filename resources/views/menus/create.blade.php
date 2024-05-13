@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-4">
                    <h4>Tambah Menu</h4>
                </div>
                <div class="card-body px-4 pt-0 pb-2">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/menus" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="fs-6 text">Nama Produk</label>
                            <input name="nama_produk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="fs-6 text">Deskripsi</label>
                            <input name="deskripsi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Deskripsi Produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="fs-6 text">Kategori</label><br>
                            <select class="custom-select" id="inputGroupSelect02" name="kategori">
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="fs-6 text">Harga</label>
                            <input name="harga" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="fs-6 text">Stok</label>
                            <input name="stok" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stok">
                        </div>
                        <!--date-->
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="fs-6 text">Expired</label>
                            <input name="expired" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Expired">
                        </div>
                        <!--upload image-->
                        <div class="form-group">
                                <label for="foto_produk" class="fs-6 text">Foto Produk</label><br>
                                <input type="file" class="form-control-file" id="foto_produk" name="foto_produk" accept="img/*" required>
                                <div id="emailHelp" class="fst-italic" class="fs-6 text">Upload image dengan ukuran KB</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection