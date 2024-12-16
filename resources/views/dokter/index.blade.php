@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Hoverable Table rows -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Dokter</h5>
      <a href="{{ route('dokter.tambah') }}" class="btn btn-primary">Tambah Data Dokter</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Spesialis</th>
            <th>Alamat</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($dokter as $dok)
          <tr>
            <td>{{ $dok->kode }}</td>
            <td>{{ $dok->nama_dokter }}</td>  
            <td>{{ $dok->nomor_telepon }}</td>
            <td>{{ $dok->email }}</td>
            <td>{{ $dok->spesialis->nama_spesialis }}</td>
            <td>
              <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dok->alamat ?? 'Tidak ada alamat' }}">
                {{ Str::limit($dok->alamat ?? 'Tidak ada alamat', 10, '...') }}
              </span>
            </td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('dokter.edit', $dok->slug) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <form class="dropdown-item" action="{{ route('dokter.destroy', $dok->slug) }}" method="post">
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