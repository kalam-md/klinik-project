@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Data Keluhan</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('keluhan.update', $keluhan->slug) }}" method="POST">
            @csrf
            @method('put')
            <div class="row g-6">
              <div class="mb-6 col-6">
                <label class="form-label" for="kode">Kode Keluhan</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{ $keluhan->kode }}"/>
              </div>
              <div class="mb-6 col-6">
                <label class="form-label" for="nama_keluhan">Nama Keluhan</label>
                <input type="text" class="form-control" id="nama_keluhan" name="nama_keluhan" value="{{ $keluhan->nama_keluhan }}"/>
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-3">Ubah</button>
            <a href="{{ route('keluhan') }}" class="btn btn-outline-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection