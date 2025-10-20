@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data Pemeriksaan</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('pendaftaran-pasien.store') }}" method="POST">
            @csrf
            <div class="row g-6 mb-6">
              <div class="col-12">
                <label class="form-label" for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" />
              </div>

              {{-- Kondisi jika login sebagai pasien --}}
              <div class="col-12">
                <label for="pasien" class="form-label">Nama Pasien</label>

                @if(Auth::user()->role === 'pasien')
                  {{-- Jika login pasien, tampilkan input readonly --}}
                  <input
                    type="text"
                    class="form-control"
                    value="{{ Auth::user()->nama_lengkap }}"
                    readonly
                  />
                  {{-- Hidden field untuk mengirimkan pasien_id --}}
                  <input type="hidden" name="pasien_id" value="{{ Auth::user()->id }}">
                @else
                  {{-- Jika bukan pasien, tampilkan dropdown --}}
                  <select class="form-select" id="pasien" name="pasien_id">
                    <option value="">Pilih Nama Pasien</option>
                    @foreach ($pasien as $pas)
                      <option value="{{ $pas->id }}">{{ $pas->nama_lengkap }}</option>
                    @endforeach
                  </select>
                @endif
              </div>

              <div class="col-12">
                <label for="keluhan" class="form-label">Keluhan Pasien</label>
                <select class="form-select" id="keluhan" name="keluhan_id">
                  <option value="">Pilih Keluhan Pasien</option>
                  @foreach ($keluhan as $kel)
                    <option value="{{ $kel->id }}">{{ $kel->nama_keluhan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12">
                <label for="dokter" class="form-label">Dokter Spesialis</label>
                <select class="form-select" id="dokter" name="dokter_id">
                  <option value="">Pilih Dokter Spesialis</option>
                  @foreach ($dokter as $dok)
                    <option value="{{ $dok->id }}">{{ $dok->nama_dokter }} - Spesialis {{ $dok->spesialis->nama_spesialis }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12">
                <label class="form-label" for="keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" cols="30" rows="5"></textarea>
              </div>
            </div>

            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('pendaftaran-pasien') }}" class="btn btn-outline-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
