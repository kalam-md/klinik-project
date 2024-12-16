@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Hoverable Table rows -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Jadwal Dokter</h5>
      <a href="{{ route('jadwal-dokter.tambah') }}" class="btn btn-primary">Tambah Data Jadwal Dokter</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Jadwal Mulai</th>
            <th>Jadwal Berakhir</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($jadwal_dokter as $jadwal)
          <tr>
            <td>{{ $jadwal->dokter->kode }}</td>
            <td>{{ $jadwal->dokter->nama_dokter }}</</td>
            <td>{{ $jadwal->dokter->spesialis->nama_spesialis }}</</td>
            <td>{{ $jadwal->jadwal_mulai }}</td>
            <td>{{ $jadwal->jadwal_berakhir }}</td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('jadwal-dokter.edit', $jadwal->slug) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <form class="dropdown-item" action="{{ route('jadwal-dokter.destroy', $jadwal->slug) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" style="all: unset; cursor: pointer"><i class="bx bx-trash me-1"></i> Hapus</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Hoverable Table rows -->
</div>
@endsection