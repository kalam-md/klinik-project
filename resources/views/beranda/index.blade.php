@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-xxl-8 mb-6 order-0">
      <div class="card">
        <div class="d-flex align-items-center row">
          <div class="col-sm-7">
            <div class="card-body">
              <h4 class="card-title text-primary mb-3">Selamat datang {{ Auth::user()->nama_lengkap }}</h4>

              <a href="{{ route('profil') }}" class="btn btn-sm btn-outline-primary">Lihat profil</a>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-6">
              <img
                src="{{ asset('template/img/illustrations/man-with-laptop.png') }}"
                height="175"
                class="scaleX-n1-rtl"
                alt="View Badge User" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-6">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between mb-4">
                <div class="avatar flex-shrink-0">
                  <img
                    src="{{ asset('template/img/icons/unicons/chart-success.png') }}"
                    alt="chart success"
                    class="rounded" />
                </div>
              </div>
              <p class="mb-1">Data Akun</p>
              <h4 class="card-title mb-3">15 Akun</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-6">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between mb-4">
                <div class="avatar flex-shrink-0">
                  <img
                    src="{{ asset('template/img/icons/unicons/wallet-info.png') }}"
                    alt="wallet info"
                    class="rounded" />
                </div>
              </div>
              <p class="mb-1">Data Dokter</p>
              <h4 class="card-title mb-3">5 Dokter</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-6">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between mb-4">
                <div class="avatar flex-shrink-0">
                  <img
                    src="{{ asset('template/img/icons/unicons/chart-success.png') }}"
                    alt="chart success"
                    class="rounded" />
                </div>
              </div>
              <p class="mb-1">Data Pasien</p>
              <h4 class="card-title mb-3">4 Pasien Terdaftar</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection