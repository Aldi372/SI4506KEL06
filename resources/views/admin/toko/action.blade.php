@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Alamat Email</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->email }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Nama Bisnis</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->nama_bisnis }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Nama Akun Media Sosial Bisnis</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->nama_akun_medsos }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Kategori Menu</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->kategori_menu }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Kategori Usaha</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->kategori_usaha }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Jumlah Pegawai/Pekerja</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->jumlah_pegawai }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Jumlah Pendapatan Perbulan</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->jumlah_pendapatan_perbulan }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Apakah memiliki Toko/Outlet Permanen?</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->punya_toko_permanen }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Alamat Usaha</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->alamat_usaha }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Kota/Kabupaten</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->kota_kabupaten }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Kecamatan</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->kecamatan }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="font-weight-bold">Foto Kartu Identitas</label>
                            </div>
                            <div class="col-12">
                                <img src="{{ asset("storage/$data->foto_ktp") }}" class="img-fluid img-thumbnail" alt="Gambar tidak ada">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Nama & No. Whatsapp Pemilik Usaha</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->nomor_pemilik_usaha }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Nama & No. Whatsapp yang dapat dihubungi/Admin</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->nomor_admin }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Rincian Perbankan</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->rincian_perbankan }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="font-weight-bold">Logo Toko</label>
                            </div>
                            <div class="col-12">
                                <img src="{{ asset("storage/$data->logo_toko") }}" class="img-fluid img-thumbnail" alt="Gambar tidak ada">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Nama menu</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->nama_menu }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Deskripsi Menu</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->deskripsi_menu }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Harga Normal/Harga Asli</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->harga_normal + 0 }}" readonly>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="font-weight-bold">Foto Produk</label>
                            </div>
                            <div class="col-12">
                                <img src="{{ asset("storage/$data->foto_produk") }}" class="img-fluid img-thumbnail" alt="Gambar tidak ada">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Dari mana mengetahui Aplikasi FoodRescue - Partner?</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->dapat_info_dari }}" readonly>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Apakah Punya Toko Cabang?</label>
                        <input type="text" class="form-control form-control-user" value="{{ $data->punya_toko_cabang }}" readonly>
                    </div>
                </div>

                
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="statusDropdown">Select Status</label>
                        <select class="form-control" id="statusDropdown">
                            <option value="active" @if($data->status == 'active') selected @endif>Active</option>
                            <option value="non-active" @if($data->status == 'non-active') selected @endif>Non-active</option>
                            <option value="suspended" @if($data->status == 'suspended') selected @endif>Suspended</option>
                        </select>
                    </div>
                    
                </div>

                <!-- Section for Save Button -->
                <div class="row mb-2">
                    <div class="col-md-6">
                        <button class="btn btn-primary float-right" id="saveStatus">Save</button>
                    </div>
                </div>

                


                <!-- <div class="row mb-2">
                    <div class="col-12">
                        <form action="{{ route('admin.dashboard.updateStatus') }}" method="post">
                            @csrf
                            <input type="hidden" name="uuid" value="{{ $data->uuid }}">
                            <button type="submit" class="btn btn-success" name="action" value="accept">Accept</button>
                            <button type="submit" class="btn btn-danger" name="action" value="reject">Reject</button>
                            @if ($data->status == 'rejected')
                                <button type="submit" class="btn btn-secondary" name="action" value="delete">Delete</button>
                            @endif
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        document.getElementById('saveStatus').addEventListener('click', function() {
            var status = document.getElementById('statusDropdown').value;
            var id = "{{ $data->id }}";

            // Kirim data ke server
            fetch("{{ route('admin.daftartoko.updateStatus', $data->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id: id,
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Status updated successfully.');
                    // Tampilkan atau sembunyikan tombol delete
                    window.location.href = "{{ route('admin.daftartoko.index') }}";
                    const deleteButton = document.getElementById('deleteButton');
                    if (data.deleted) {
                        deleteButton.style.display = 'block';
                    } else {
                        deleteButton.style.display = 'none';
                    }
                    // location.reload();
                    window.location.href = "{{ route('admin.daftartoko.index') }}";
                } else {
                    alert('Failed to update status.');
                }
            })
        

            document.addEventListener('DOMContentLoaded', function() {
            var statusDropdown = document.getElementById('statusDropdown');
            var deleteButton = document.getElementById('deleteButton');

            // Periksa status saat halaman dimuat
            if (statusDropdown.value === 'non-active' || statusDropdown.value === 'suspended') {
                deleteButton.style.display = 'block';
            } else {
                deleteButton.style.display = 'none';
            }

            // Tampilkan atau sembunyikan tombol delete saat memilih status
            statusDropdown.addEventListener('change', function() {
                if (statusDropdown.value === 'non-active' || statusDropdown.value === 'suspended') {
                    deleteButton.style.display = 'block';
                } else {
                    deleteButton.style.display = 'none';
                }
            });
        });
        });
    </script>
@endsection

