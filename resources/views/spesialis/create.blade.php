@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data Spesialis</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('spesialis.store') }}" method="POST">
            @csrf
            <div class="row g-6">
              <div class="mb-6 col-6">
                <label class="form-label" for="kode">Kode Spesialis</label>
                <input type="text" class="form-control" id="kode" name="kode"/>
              </div>
              <div class="mb-6 col-6">
                <label class="form-label" for="nama_spesialis">Nama Spesialis</label>
                <input type="text" class="form-control" id="nama_spesialis" name="nama_spesialis"/>
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('spesialis') }}" class="btn btn-outline-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection