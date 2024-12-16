@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Notifications -->
        <div class="card-body">
          <h5 class="mb-1">{{ $pendaftaran->pasien->nama_lengkap }}</h5>
          <span class="card-subtitle">Berikut detail lengkap dari data pendaftaran pasien atas nama {{ $pendaftaran->pasien->nama_lengkap }}</span>
          <div class="error"></div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="text-nowrap">Kode</th>
                <th class="text-nowrap">Tanggal Pemeriksaan</th>
                <th class="text-nowrap">Nama Pasien</th>
                <th class="text-nowrap">Keluhan</th>
                <th class="text-nowrap">Dokter</th>
                <th class="text-nowrap text-center">Nomor Antrian</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-nowrap">{{ $pendaftaran->kode }}</td>
                <td class="text-nowrap">{{ $pendaftaran->tanggal_pemeriksaan }}</td>
                <td class="text-nowrap">{{ $pendaftaran->pasien->nama_lengkap }}</td>
                <td class="text-nowrap">{{ $pendaftaran->keluhan->nama_keluhan }}</td>
                <td class="text-nowrap">{{ $pendaftaran->dokter->nama_dokter }}</td>
                <td class="text-nowrap text-center">
                  <span class="badge bg-info">{{ $pendaftaran->nomor_antrian }}</span>
                </td>
              </tr>
              <tr>
                <td class="text-nowrap text-heading">Keterangan :</td>
              </tr>
              <tr>
                <td class="text-nowrap" colspan="6">
                  Pemeriksaan dilakukan pada jam {{ $pendaftaran->dokter->jadwal->first()->jadwal_mulai }} - {{ $pendaftaran->dokter->jadwal->first()->jadwal_berakhir }} WIB, dengan keterangan : {{ $pendaftaran->keterangan }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-body">
          <form action="javascript:void(0);">
            <div class="row">
              <div>
                @can('isAdmin')
                <a href="{{ route('pendaftaran-pasien.print', $pendaftaran->slug) }}" class="btn btn-primary me-3"><span class="tf-icons bx bx-file bx-18px me-2"></span>Cetak</a>
                @endcan
                <a href="{{ route('pendaftaran-pasien') }}" class="btn btn-outline-secondary">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection