@extends('admin.layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Toko</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- All Partners -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            All Partners</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allData }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Active Partners</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataActive}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Non-Active Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Non-Active Partners</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataNonActive }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Suspended Card-->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Suspended Partners</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataSuspended }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">List of Partners</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Bisnis</th>
                                <th>Kategori Menu</th>
                                <th>Kategori Usaha</th>
                                <th>Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama_bisnis }}</td>
                                    <td>{{ $data->kategori_menu }}</td>
                                    <td>{{ $data->kategori_usaha }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td class="text-center">
                                        @if ($data->status == 'active')
                                            <button class="btn btn-sm btn-success">
                                                {{ ucfirst($data->status) }}
                                            </button>
                                        @elseif ($data->status == 'non-active')
                                            <button class="btn btn-sm btn-waning">
                                                {{ ucfirst($data->status) }}
                                            </button>
                                        @elseif ($data->status == 'suspended')
                                            <button class="btn btn-sm btn-danger">
                                                {{ ucfirst($data->status) }}
                                            </button>
                                        @endif
                                    </td>
                                    <td class="text-center"><a href="{{ route('admin.daftartoko.action', $data->id) }}" class="btn btn-sm btn-info">Action</a></td>
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

@section('js')
@if (session()->has('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session()->get('success') }}",
            icon: "success"
        });
    </script>
@endif
@endsection