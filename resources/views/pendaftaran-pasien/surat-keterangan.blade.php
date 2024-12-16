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
        }
        .kop-surat {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat h1 {
            margin: 5px 0;
            font-size: 18px;
        }
        .kop-surat p {
            margin: 5px 0;
            font-size: 12px;
        }
        .informasi-surat {
            margin-bottom: 20px;
        }
        .informasi-surat div {
            margin-bottom: 10px;
        }
        .tabel-pemeriksaan {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .tabel-pemeriksaan td {
            padding: 8px;
            border: 1px solid #000;
        }
        .tanda-tangan {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        .tanda-tangan-box {
            width: 200px;
            text-align: center;
        }
        .tanda-tangan-box .garis {
            border-top: 1px solid black;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <h1>KLINIK ABC</h1>
        <p>Jalan Kesehatan No. 123, Kota Sehat</p>
        <p>Telp: (021) 123-4567 | Email: info@klinikabc.com</p>
    </div>

    <div class="informasi-surat">
        <div><strong>Nomor Surat:</strong> 001/KSS/XII/2024</div>
        <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pendaftaran->tanggal_pemeriksaan)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}</div>
        <div><strong>Waktu Pemeriksaan:</strong> {{ $pendaftaran->dokter->jadwal->first()->jadwal_mulai }} - {{ $pendaftaran->dokter->jadwal->first()->jadwal_berakhir }} WIB</div>
    </div>

    <table class="tabel-pemeriksaan">
        <tr>
            <td><strong>Nama Pasien</strong></td>
            <td>{{ $pendaftaran->pasien->nama_lengkap }}</td>
        </tr>
        <tr>
            <td><strong>No. Antrian</strong></td>
            <td>{{ $pendaftaran->nomor_antrian }}</td>
        </tr>
        <tr>
            <td><strong>Keluhan</strong></td>
            <td>{{ $pendaftaran->keluhan->nama_keluhan }}</td>
        </tr>
        <tr>
            <td><strong>Dokter Pemeriksa</strong></td>
            <td>{{ $pendaftaran->dokter->nama_dokter }}</td>
        </tr>
    </table>

    <p>Keterangan:</p>
    <small>{{ $pendaftaran->keterangan }}</small>

    <div class="tanda-tangan">
        <div class="tanda-tangan-box">
            <p>Dokter Pemeriksa</p>
            <div style="height: 100px;"></div>
            <div class="garis">
                {{ $pendaftaran->dokter->nama_dokter }}
            </div>
        </div>
    </div>
</body>
</html>