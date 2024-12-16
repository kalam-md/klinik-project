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
          <form action="{{ route('jadwal-dokter.update', $jadwal->slug) }}" method="POST">
            @csrf
            @method('put')
            <div class="row g-6 mb-6">
              <div class="col-6">
                <label class="form-label" for="jadwal_mulai">Jadwal Mulai</label>
                <input type="time" class="form-control" id="jadwal_mulai" name="jadwal_mulai" value="{{ $jadwal->jadwal_mulai }}"/>
              </div>
              <div class="col-6">
                <label class="form-label" for="jadwal_berakhir">Jadwal Berakhir</label>
                <input type="time" class="form-control" id="jadwal_berakhir" name="jadwal_berakhir" value="{{ $jadwal->jadwal_berakhir }}"/>
              </div>
              <div class="col-12">
                <label for="dokter" class="form-label">Dokter</label>
                <select class="form-select" id="dokter" name="dokter_id">
                  <option>Pilih Dokter</option>
                  @foreach ($dokter as $dok)
                  <option value="{{ $dok->id }}" {{ $jadwal->dokter_id == $dok->id ? 'selected' : '' }}>
                    {{ $dok->nama_dokter }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-3">Ubah</button>
            <a href="{{ route('jadwal-dokter') }}" class="btn btn-outline-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection