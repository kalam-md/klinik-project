<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pemeriksaan Klinik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
            font-size: 12px;
        }
        .kop-surat {
            text-align: center;
            border-bottom: 3px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat h1 {
            margin: 5px 0;
            font-size: 20px;
            color: #333;
        }
        .kop-surat p {
            margin: 3px 0;
            font-size: 11px;
            color: #666;
        }
        .judul-dokumen {
            text-align: center;
            margin: 20px 0;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: underline;
        }
        .informasi-surat {
            margin-bottom: 20px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
        .informasi-surat div {
            margin-bottom: 8px;
            display: flex;
        }
        .informasi-surat div strong {
            width: 180px;
            display: inline-block;
        }
        .tabel-pemeriksaan {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .tabel-pemeriksaan td {
            padding: 10px;
            border: 1px solid #333;
        }
        .tabel-pemeriksaan td:first-child {
            width: 180px;
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        /* Rekam Medis Styles */
        .rekam-medis-section {
            margin-top: 30px;
            page-break-before: auto;
        }
        .rekam-medis-title {
            background-color: #333;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }
        .vital-signs {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        .vital-item {
            display: table-cell;
            width: 25%;
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
        .vital-label {
            font-size: 10px;
            color: #666;
            margin-bottom: 5px;
        }
        .vital-value {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }
        .medical-info {
            margin-bottom: 15px;
        }
        .medical-info-title {
            background-color: #e9ecef;
            padding: 8px;
            font-weight: bold;
            border-left: 4px solid #333;
            margin-bottom: 8px;
        }
        .medical-info-content {
            padding: 10px;
            border: 1px solid #ddd;
            min-height: 60px;
            text-align: justify;
        }
        .keterangan-box {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .keterangan-box strong {
            color: #856404;
        }
        .tanda-tangan {
            margin-top: 50px;
            display: table;
            width: 100%;
        }
        .tanda-tangan-box {
            display: table-cell;
            width: 50%;
            text-align: center;
            padding: 0 20px;
        }
        .tanda-tangan-box p {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .tanda-tangan-box .tanggal {
            font-size: 11px;
            margin-bottom: 60px;
        }
        .tanda-tangan-box .garis {
            border-top: 1px solid black;
            margin-top: 10px;
            padding-top: 5px;
        }
        .footer-note {
            margin-top: 30px;
            font-size: 10px;
            color: #666;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border-radius: 3px;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <h1>KLINIK ABC</h1>
        <p>Jalan Kesehatan No. 123, Kota Sehat</p>
        <p>Telp: (021) 123-4567 | Email: info@klinikabc.com | Website: www.klinikabc.com</p>
    </div>

    <div class="judul-dokumen">
        Surat Keterangan Pemeriksaan Kesehatan
    </div>

    <div class="informasi-surat">
        <div>
            <strong>Kode Pendaftaran</strong>
            <span>: {{ $pendaftaran->kode }}</span>
        </div>
        <div>
            <strong>Tanggal Pemeriksaan</strong>
            <span>: {{ \Carbon\Carbon::parse($pendaftaran->tanggal_pemeriksaan)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}</span>
        </div>
        <div>
            <strong>Waktu Pemeriksaan</strong>
            <span>: {{ $pendaftaran->dokter->jadwal->first()->jadwal_mulai }} - {{ $pendaftaran->dokter->jadwal->first()->jadwal_berakhir }} WIB</span>
        </div>
    </div>

    <table class="tabel-pemeriksaan">
        <tr>
            <td>Nama Pasien</td>
            <td>{{ $pendaftaran->pasien->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Nomor Antrian</td>
            <td><span class="badge">{{ $pendaftaran->nomor_antrian }}</span></td>
        </tr>
        <tr>
            <td>Keluhan Awal</td>
            <td>{{ $pendaftaran->keluhan->nama_keluhan }}</td>
        </tr>
        <tr>
            <td>Dokter Pemeriksa</td>
            <td>{{ $pendaftaran->dokter->nama_dokter }} ({{ $pendaftaran->dokter->spesialis->nama_spesialis }})</td>
        </tr>
    </table>

    @if($pendaftaran->keterangan)
    <div class="keterangan-box">
        <strong>Keterangan Pendaftaran:</strong><br>
        {{ $pendaftaran->keterangan }}
    </div>
    @endif

    @if($pendaftaran->rekamMedis)
    <div class="rekam-medis-section">
        <div class="rekam-medis-title">
            HASIL REKAM MEDIS PASIEN
        </div>

        <div style="text-align: center; margin-bottom: 15px; font-size: 11px; color: #666;">
            Kode Rekam Medis: <strong>{{ $pendaftaran->rekamMedis->kode }}</strong> | 
            Dibuat: {{ $pendaftaran->rekamMedis->created_at->format('d/m/Y H:i') }} WIB
        </div>

        <!-- Vital Signs -->
        @if($pendaftaran->rekamMedis->tekanan_darah || $pendaftaran->rekamMedis->suhu_tubuh || $pendaftaran->rekamMedis->berat_badan || $pendaftaran->rekamMedis->tinggi_badan)
        <div class="vital-signs">
            <div class="vital-item">
                <div class="vital-label">Tekanan Darah</div>
                <div class="vital-value">{{ $pendaftaran->rekamMedis->tekanan_darah ?? '-' }}</div>
            </div>
            <div class="vital-item">
                <div class="vital-label">Suhu Tubuh</div>
                <div class="vital-value">{{ $pendaftaran->rekamMedis->suhu_tubuh ? $pendaftaran->rekamMedis->suhu_tubuh . '°C' : '-' }}</div>
            </div>
            <div class="vital-item">
                <div class="vital-label">Berat Badan</div>
                <div class="vital-value">{{ $pendaftaran->rekamMedis->berat_badan ? $pendaftaran->rekamMedis->berat_badan . ' kg' : '-' }}</div>
            </div>
            <div class="vital-item">
                <div class="vital-label">Tinggi Badan</div>
                <div class="vital-value">{{ $pendaftaran->rekamMedis->tinggi_badan ? $pendaftaran->rekamMedis->tinggi_badan . ' cm' : '-' }}</div>
            </div>
        </div>
        @endif

        <!-- Hasil Pemeriksaan -->
        <div class="medical-info">
            <div class="medical-info-title">HASIL PEMERIKSAAN</div>
            <div class="medical-info-content">
                {{ $pendaftaran->rekamMedis->hasil_pemeriksaan }}
            </div>
        </div>

        <!-- Diagnosis -->
        <div class="medical-info">
            <div class="medical-info-title">DIAGNOSIS</div>
            <div class="medical-info-content">
                {{ $pendaftaran->rekamMedis->diagnosis }}
            </div>
        </div>

        <!-- Tindakan Medis -->
        <div class="medical-info">
            <div class="medical-info-title">TINDAKAN MEDIS</div>
            <div class="medical-info-content">
                {{ $pendaftaran->rekamMedis->tindakan_medis }}
            </div>
        </div>

        <!-- Resep Obat -->
        @if($pendaftaran->rekamMedis->resep_obat)
        <div class="medical-info">
            <div class="medical-info-title">RESEP OBAT</div>
            <div class="medical-info-content">
                {{ $pendaftaran->rekamMedis->resep_obat }}
            </div>
        </div>
        @endif

        <!-- Catatan Tambahan -->
        @if($pendaftaran->rekamMedis->catatan_tambahan)
        <div class="medical-info">
            <div class="medical-info-title">CATATAN TAMBAHAN</div>
            <div class="medical-info-content">
                {{ $pendaftaran->rekamMedis->catatan_tambahan }}
            </div>
        </div>
        @endif
    </div>
    @else
    <div class="keterangan-box" style="background-color: #f8d7da; border-color: #f5c6cb;">
        <strong style="color: #721c24;">Catatan:</strong> Rekam medis untuk pemeriksaan ini belum tersedia atau belum dilengkapi oleh dokter pemeriksa.
    </div>
    @endif

    <div class="tanda-tangan">
        <div class="tanda-tangan-box">
            <p>Pasien</p>
            <div class="tanggal">Kota Sehat, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
            <div style="height: 60px;"></div>
            <div class="garis">
                {{ $pendaftaran->pasien->nama_lengkap }}
            </div>
        </div>
        <div class="tanda-tangan-box">
            <p>Dokter Pemeriksa</p>
            <div class="tanggal">Kota Sehat, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
            <div style="height: 60px;"></div>
            <div class="garis">
                {{ $pendaftaran->dokter->nama_dokter }}
            </div>
        </div>
    </div>

    <div class="footer-note">
        <p>Dokumen ini dicetak secara otomatis dari sistem informasi Klinik ABC.</p>
        <p>Untuk verifikasi, hubungi Klinik ABC di nomor telepon (021) 123-4567.</p>
    </div>
</body>
</html>