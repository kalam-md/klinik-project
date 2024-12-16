@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Pendaftaran Pasien</h5>
      <a href="{{ route('pendaftaran-pasien.tambah') }}" class="btn btn-primary">Tambah Pemeriksaan</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Kode</th>
            <th class="text-center">Antrian</th>
            <th>Nama Pasien</th>
            <th>Keluhan</th>
            <th>Dokter</th>
            <th class="text-center">Tanggal Pemeriksaan</th>
            <th>Keterangan</th>
            @can('isAdmin')
            <th class="text-center">Aksi</th>
            @endcan
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($pendaftaran_pasien as $daftar)
          <tr>
            <td>
              <a href="{{ route('pendaftaran-pasien.detail', $daftar->slug) }}">{{ $daftar->kode }}</a>
            </td>
            <td class="text-center"><span class="badge bg-info">{{ $daftar->nomor_antrian }}</span></td>
            <td>{{ $daftar->pasien->nama_lengkap }}</td>
            <td>{{ $daftar->keluhan->nama_keluhan }}</td>
            <td>{{ $daftar->dokter->nama_dokter }}</td>
            <td class="text-center">{{ $daftar->tanggal_pemeriksaan }}</td>
            <td>
                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $daftar->keterangan ?? 'Tidak ada alamat' }}">
                    {{ Str::limit($daftar->keterangan ?? 'Tidak ada alamat', 10, '...') }}
                </span>
            </td>
            @can('isAdmin')
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('pendaftaran-pasien.edit', $daftar->slug) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <form class="dropdown-item" action="{{ route('pendaftaran-pasien.destroy', $daftar->slug) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" style="all: unset; cursor: pointer"><i class="bx bx-trash me-1"></i> Hapus</button>
                  </form>
                </div>
              </div>
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="demo-inline-spacing d-flex justify-content-center">
      <nav aria-label="Page navigation">
        <ul class="pagination">
          {{ $pendaftaran_pasien->links('pagination::bootstrap-4') }}
        </ul>
      </nav>
    </div>
  </div>
</div>
@endsection