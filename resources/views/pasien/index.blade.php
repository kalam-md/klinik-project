@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Hoverable Table rows -->
  <div class="card">
    <h5 class="card-header">Data Pasien</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nama Pasien</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($pasiens as $pasien)
          <tr>
            <td>{{ $pasien->nama_lengkap }}</td>
            <td>{{ $pasien->nomor_telepon }}</td>
            <td>{{ $pasien->email }}</td>
            <td>{{ $pasien->biodata?->tanggal_lahir ?? 'Tidak ada data' }}</td>
            <td>{{ $pasien->biodata?->jenis_kelamin ?? 'Tidak ada data' }}</td>
            <td>
                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $pasien->biodata?->alamat ?? 'Tidak ada alamat' }}">
                    {{ Str::limit($pasien->biodata?->alamat ?? 'Tidak ada alamat', 10, '...') }}
                </span>
            </td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
                  <a class="dropdown-item" href="javascript:void(0);"
                    ><i class="bx bx-trash me-1"></i> Delete</a
                  >
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