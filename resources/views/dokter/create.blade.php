@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data Dokter</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('dokter.store') }}" method="POST">
            @csrf
            <div class="row g-6 mb-6">
              <div class="col-6">
                <label class="form-label" for="kode">Kode Dokter</label>
                <input type="text" class="form-control" id="kode" name="kode"/>
              </div>
              <div class="col-6">
                <label class="form-label" for="nama_dokter">Nama Dokter</label>
                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter"/>
              </div>
              <div class="col-6">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"/>
              </div>
              <div class="col-6">
                <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"/>
              </div>
              <div class="col-12">
                <label for="spesialis" class="form-label">Spesialis</label>
                <select class="form-select" id="spesialis" name="spesialis_id">
                  <option>Pilih Spesialis</option>
                  @foreach ($spesialis as $spe)
                  <option value="{{ $spe->id }}">{{ $spe->nama_spesialis }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="" cols="30" rows="5"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('dokter') }}" class="btn btn-outline-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection