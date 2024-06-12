@extends('layouts.app-customer')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Profil Saya</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('customer.update_profil') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <label for="foto">Foto Profil</label>
                                <div class="text-center mb-4">
                                    <img src="{{ $profil_customer->foto ? asset('storage/images/foto_profil/' . $profil_customer->foto) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                                        alt="{{ $profil_customer->name }}" class="rounded-circle img-thumbnail"
                                        width="150">
                                    <h5 class="text-center mt-2">{{ $profil_customer->name }}</h5>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter full name" value="{{ $profil_customer->name }}" />
                                </div>
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" name="email"
                                        placeholder="Enter email ID" value="{{ $profil_customer->email }}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="phone">No. Hp</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Enter phone number" value="{{ $profil_customer->no_hp }}" />
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="website">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="website" name="birthplace"
                                                placeholder="Enter birth place"
                                                value="{{ $profil_customer->tempat_lahir }}" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="birthdate">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate"
                                                placeholder="Enter birth date"
                                                value="{{ $profil_customer->tanggal_lahir }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" id="cancel" name="cancel"
                                        class="btn btn-secondary">Cancel</button>
                                    <button type="submit" id="update" name="update"
                                        class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>

@endsection