@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h3>Daftar Menu</h3>
              <a href="/menus/create" class="btn btn-success float-end">Tambah Menu</a>
            </div>
            <div class="card-body px-4 pt-0 pb-2">
              <div class="table-responsive p-0" style="overflow-x: auto;">
                <table class="table table-sm align-items-center mb-0">
                  <colgroup>
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 10%;">
                    <col style="width: 10%;">
                    <col style="width: 10%;">
                    <col style="width: 10%;">
                    <col style="width: 10%;">
                    <col style="width: 20%;">
                  </colgroup>
                  <thead class="text-center">
                    <tr>
                      <th class="text-dark">Nama Produk</th>
                      <th class="text-dark">Deskripsi</th>
                      <th class="text-dark">Kategori</th>
                      <th class="text-dark">Harga</th>
                      <th class="text-dark">Stok</th>
                      <th class="text-dark">Expired</th> 
                      <th class="text-dark">Foto Produk</th> 
                      <th class="text-dark">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach($menus as $menu)
                    <tr>
                      <td>{{  ucwords($menu->nama_produk)  }}</td>
                      <td>{{  ucwords($menu->deskripsi)  }}</td>
                      <td>{{  ucwords($menu->kategori)  }}</td>
                      <td>{{  'Rp' . number_format($menu->harga, 0, ',', '.')  }}</td>
                      <td>{{  ucwords($menu->stok)  }}</td>
                      <td>{{  ucwords($menu->expired)  }}</td>
                      <td><img src="{{ asset($menu->foto_produk) }}" alt="" style="max-width: 100px;"><!--{{  ucwords($menu->foto_produk)  }}--></td>
                      <td>
                        <a href="/menus/{{ $menu->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/menus/{{ $menu->id }}" method="POST">
                          @method("DELETE")
                          @csrf
                          <input type="submit" class="btn btn-danger" value="Hapus"> 
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection