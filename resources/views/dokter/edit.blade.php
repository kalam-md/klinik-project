@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Data Dokter</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('dokter.update', $dokter->slug) }}" method="POST">
            @csrf
            @method('put')
            <div class="row g-6 mb-6">
              <div class="col-6">
                <label class="form-label" for="kode">Kode Dokter</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{ $dokter->kode }}"/>
              </div>
              <div class="col-6">
                <label class="form-label" for="nama_dokter">Nama Dokter</label>
                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="{{ $dokter->nama_dokter }}"/>
              </div>
              <div class="col-6">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $dokter->email }}"/>
              </div>
              <div class="col-6">
                <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $dokter->nomor_telepon }}"/>
              </div>
              <div class="col-12">
                <label for="spesialis" class="form-label">Spesialis</label>
                <select class="form-select" id="spesialis" name="spesialis_id">
                  <option>Pilih Spesialis</option>
                  @foreach ($spesialis as $spe)
                  <option value="{{ $spe->id }}" {{ $dokter->spesialis_id == $spe->id ? 'selected' : '' }}>
                    {{ $spe->nama_spesialis }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="col-12">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="" cols="30" rows="5">{{ $dokter->alamat }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-3">Ubah</button>
            <a href="{{ route('dokter') }}" class="btn btn-outline-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection