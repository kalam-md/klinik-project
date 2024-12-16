@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Kode Keluhan</h5>
      <a href="{{ route('keluhan.tambah') }}" class="btn btn-primary">Tambah Data Keluhan</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama Keluhan</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($keluhans as $keluhan)
          <tr>
            <td>{{ $keluhan->kode }}</td>
            <td>{{ $keluhan->nama_keluhan }}</td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('keluhan.edit', $keluhan->slug) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <form class="dropdown-item" action="{{ route('keluhan.destroy', $keluhan->slug) }}" method="post">
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
</div>
@endsection