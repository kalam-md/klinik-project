@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-6">
        <div class="card-body pt-4">
          <form id="formAccountSettings" method="POST" action="{{ route('profil.update') }}">
            @csrf
            <div class="row g-6">
                <div class="col-md-12">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}"/>
                </div>
                <div class="col-md-6">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input class="form-control" type="number" name="nomor_telepon" id="nomor_telepon" value="{{ Auth::user()->nomor_telepon }}" />
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}" />
                </div>
                <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $biodata->tanggal_lahir }}" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki" {{ $biodata->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" cols="30" rows="5">{{ $biodata->alamat }}</textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn btn-primary me-3">Simpan perubahan</button>
                <a href="{{ route('beranda') }}" class="btn btn-outline-secondary">Kembali</a>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
    </div>
  </div>
</div>
@endsection