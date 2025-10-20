@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <!-- Detail Pendaftaran -->
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
      </div>

      <!-- Rekam Medis Section -->
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Rekam Medis Pasien</h5>
          @can('isAdmin')
            @if(!$pendaftaran->rekamMedis)
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalRekamMedis">
                <span class="tf-icons bx bx-plus bx-18px me-1"></span>Tambah Rekam Medis
              </button>
            @endif
          @endcan
        </div>
        <div class="card-body">
          @if($pendaftaran->rekamMedis)
            <!-- Display Rekam Medis -->
            <div class="row mb-3">
              <div class="col-md-12">
                <h6 class="text-primary mb-3">
                  <i class="bx bx-file-blank me-2"></i>Kode Rekam Medis: {{ $pendaftaran->rekamMedis->kode }}
                </h6>
              </div>
            </div>

            <!-- Vital Signs -->
            <div class="row mb-4">
              <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                  <i class="bx bx-heart text-danger fs-4"></i>
                  <p class="mb-0 mt-2 text-muted small">Tekanan Darah</p>
                  <h6 class="mb-0">{{ $pendaftaran->rekamMedis->tekanan_darah ?? '-' }}</h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                  <i class="bx bx-body text-warning fs-4"></i>
                  <p class="mb-0 mt-2 text-muted small">Suhu Tubuh</p>
                  <h6 class="mb-0">{{ $pendaftaran->rekamMedis->suhu_tubuh ?? '-' }}°C</h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                  <i class="bx bx-body text-info fs-4"></i>
                  <p class="mb-0 mt-2 text-muted small">Berat Badan</p>
                  <h6 class="mb-0">{{ $pendaftaran->rekamMedis->berat_badan ?? '-' }} kg</h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                  <i class="bx bx-ruler text-success fs-4"></i>
                  <p class="mb-0 mt-2 text-muted small">Tinggi Badan</p>
                  <h6 class="mb-0">{{ $pendaftaran->rekamMedis->tinggi_badan ?? '-' }} cm</h6>
                </div>
              </div>
            </div>

            <!-- Medical Details -->
            <div class="row">
              <div class="col-md-12 mb-3">
                <h6 class="text-muted">Hasil Pemeriksaan</h6>
                <p class="border rounded p-3">{{ $pendaftaran->rekamMedis->hasil_pemeriksaan }}</p>
              </div>
              <div class="col-md-12 mb-3">
                <h6 class="text-muted">Diagnosis</h6>
                <p class="border rounded p-3">{{ $pendaftaran->rekamMedis->diagnosis }}</p>
              </div>
              <div class="col-md-12 mb-3">
                <h6 class="text-muted">Tindakan Medis</h6>
                <p class="border rounded p-3">{{ $pendaftaran->rekamMedis->tindakan_medis }}</p>
              </div>
              @if($pendaftaran->rekamMedis->resep_obat)
              <div class="col-md-12 mb-3">
                <h6 class="text-muted">Resep Obat</h6>
                <p class="border rounded p-3">{{ $pendaftaran->rekamMedis->resep_obat }}</p>
              </div>
              @endif
              @if($pendaftaran->rekamMedis->catatan_tambahan)
              <div class="col-md-12 mb-3">
                <h6 class="text-muted">Catatan Tambahan</h6>
                <p class="border rounded p-3">{{ $pendaftaran->rekamMedis->catatan_tambahan }}</p>
              </div>
              @endif
              <div class="col-md-12">
                <small class="text-muted">
                  <i class="bx bx-user me-1"></i>Dibuat oleh: {{ $pendaftaran->rekamMedis->createdBy->nama_lengkap }} 
                  <i class="bx bx-calendar ms-3 me-1"></i>{{ $pendaftaran->rekamMedis->created_at->format('d M Y H:i') }}
                </small>
              </div>
            </div>

            @can('isAdmin')
            <div class="mt-4">
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditRekamMedis">
                <span class="tf-icons bx bx-edit bx-18px me-1"></span>Edit Rekam Medis
              </button>
            </div>
            @endcan

          @else
            <div class="alert alert-info mb-0">
              <i class="bx bx-info-circle me-2"></i>
              Rekam medis belum tersedia untuk pendaftaran ini.
            </div>
          @endif
        </div>
        
        <div class="card-body border-top">
          <div class="row">
            <div>
              @can('isAdmin')
              <a href="{{ route('pendaftaran-pasien.print', $pendaftaran->slug) }}" class="btn btn-primary me-3">
                <span class="tf-icons bx bx-file bx-18px me-2"></span>Cetak
              </a>
              @endcan
              <a href="{{ route('pendaftaran-pasien') }}" class="btn btn-outline-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Rekam Medis -->
@can('isAdmin')
<div class="modal fade" id="modalRekamMedis" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Rekam Medis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('rekam-medis.store', $pendaftaran->slug) }}" method="POST">
        @csrf
        <div class="modal-body">
          <!-- Vital Signs -->
          <h6 class="mb-3">Data Vital</h6>
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Tekanan Darah</label>
              <input type="text" class="form-control" name="tekanan_darah" placeholder="120/80 mmHg">
            </div>
            <div class="col-md-6">
              <label class="form-label">Suhu Tubuh</label>
              <input type="text" class="form-control" name="suhu_tubuh" placeholder="36.5">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Berat Badan (kg)</label>
              <input type="text" class="form-control" name="berat_badan" placeholder="60">
            </div>
            <div class="col-md-6">
              <label class="form-label">Tinggi Badan (cm)</label>
              <input type="text" class="form-control" name="tinggi_badan" placeholder="170">
            </div>
          </div>

          <hr>

          <!-- Medical Records -->
          <h6 class="mb-3">Data Medis</h6>
          <div class="mb-3">
            <label class="form-label">Hasil Pemeriksaan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="hasil_pemeriksaan" rows="1" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Diagnosis <span class="text-danger">*</span></label>
            <textarea class="form-control" name="diagnosis" rows="1" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Tindakan Medis <span class="text-danger">*</span></label>
            <textarea class="form-control" name="tindakan_medis" rows="1" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Resep Obat</label>
            <textarea class="form-control" name="resep_obat" rows="1"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Catatan Tambahan</label>
            <textarea class="form-control" name="catatan_tambahan" rows="1"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="margin-right: 5px">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Rekam Medis</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Rekam Medis -->
@if($pendaftaran->rekamMedis)
<div class="modal fade" id="modalEditRekamMedis" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Rekam Medis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('rekam-medis.update', $pendaftaran->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <!-- Vital Signs -->
          <h6 class="mb-3">Data Vital</h6>
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Tekanan Darah</label>
              <input type="text" class="form-control" name="tekanan_darah" value="{{ $pendaftaran->rekamMedis->tekanan_darah }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Suhu Tubuh</label>
              <input type="text" class="form-control" name="suhu_tubuh" value="{{ $pendaftaran->rekamMedis->suhu_tubuh }}">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Berat Badan (kg)</label>
              <input type="text" class="form-control" name="berat_badan" value="{{ $pendaftaran->rekamMedis->berat_badan }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Tinggi Badan (cm)</label>
              <input type="text" class="form-control" name="tinggi_badan" value="{{ $pendaftaran->rekamMedis->tinggi_badan }}">
            </div>
          </div>

          <hr>

          <!-- Medical Records -->
          <h6 class="mb-3">Data Medis</h6>
          <div class="mb-3">
            <label class="form-label">Hasil Pemeriksaan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="hasil_pemeriksaan" rows="3" required>{{ $pendaftaran->rekamMedis->hasil_pemeriksaan }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Diagnosis <span class="text-danger">*</span></label>
            <textarea class="form-control" name="diagnosis" rows="3" required>{{ $pendaftaran->rekamMedis->diagnosis }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Tindakan Medis <span class="text-danger">*</span></label>
            <textarea class="form-control" name="tindakan_medis" rows="3" required>{{ $pendaftaran->rekamMedis->tindakan_medis }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Resep Obat</label>
            <textarea class="form-control" name="resep_obat" rows="3">{{ $pendaftaran->rekamMedis->resep_obat }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Catatan Tambahan</label>
            <textarea class="form-control" name="catatan_tambahan" rows="2">{{ $pendaftaran->rekamMedis->catatan_tambahan }}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Update Rekam Medis</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif
@endcan
@endsection