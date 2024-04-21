@extends('admin.layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataPending }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Accepted Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Accepted Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataAccepted }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rejected Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Rejected Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataRejected }}</div>
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
                <h6 class="m-0 font-weight-bold">Partner Registration Requests</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Email</th>
                                <th>Nama Bisnis</th>
                                <th>Kategori Menu</th>
                                <th>Kategori Usaha</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ date_format($data->created_at, 'd/M/Y') }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->nama_bisnis }}</td>
                                    <td>{{ $data->kategori_menu }}</td>
                                    <td>{{ $data->kategori_usaha }}</td>
                                    <td class="text-center">
                                        @if ($data->status == 'pending')
                                            <button class="btn btn-sm btn-warning">
                                                {{ ucfirst($data->status) }}
                                            </button>
                                        @elseif ($data->status == 'accepted')
                                            <button class="btn btn-sm btn-success">
                                                {{ ucfirst($data->status) }}
                                            </button>
                                        @elseif ($data->status == 'rejected')
                                            <button class="btn btn-sm btn-danger">
                                                {{ ucfirst($data->status) }}
                                            </button>
                                        @endif
                                    </td>
                                    <td class="text-center"><a href="{{ route('admin.dashboard.view', $data->uuid) }}" class="btn btn-sm btn-info">View</a></td>
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
