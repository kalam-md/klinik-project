<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Keluhan;
use App\Models\PendaftaranPasien;
use App\Models\RekamMedis;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendaftaranPasienController extends Controller
{
    public function index()
    {
        return view('pendaftaran-pasien.index', [
            'pendaftaran_pasien' => PendaftaranPasien::paginate(10)
        ]);
    }

    public function create()
    {
        return view('pendaftaran-pasien.create', [
            'dokter' => Dokter::all(),
            'keluhan' => Keluhan::all(),
            'pasien' => User::where('role', 'pasien')->with('biodata')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_pemeriksaan' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'keluhan_id' => 'required|max:255',
            'pasien_id' => 'required|max:255',
            'dokter_id' => 'required|max:255',
        ]);

        $tanggal = \Carbon\Carbon::parse($request->tanggal_pemeriksaan)->format('Ymd');

        $uniqueString = $tanggal .
            \Carbon\Carbon::now()->format('His') .
            Str::random(5);

        $validatedData['kode'] = 'ARS' . $uniqueString;

        $terakhirAntrian = PendaftaranPasien::where('tanggal_pemeriksaan', $request->tanggal_pemeriksaan)
            ->where('dokter_id', $request->dokter_id)
            ->max('nomor_antrian');

        $nomorAntrian = $terakhirAntrian ? $terakhirAntrian + 1 : 1;
        $validatedData['nomor_antrian'] = $nomorAntrian;

        $validatedData['slug'] = SlugService::createSlug(PendaftaranPasien::class, 'slug', $validatedData['kode']);

        PendaftaranPasien::create($validatedData);

        alert()->success('Sukses', "Pendaftaran Pasien berhasil dibuat. Nomor Antrian Anda: $nomorAntrian");
        return redirect('/pendaftaran-pasien');
    }

    public function show($slug)
    {
        $pendaftaran = PendaftaranPasien::where('slug', $slug)->first();

        return view('pendaftaran-pasien.show', [
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function printSuratKeterangan($slug)
    {
        $pendaftaran = PendaftaranPasien::where('slug', $slug)->first();

        $pdf = Pdf::loadView('pendaftaran-pasien.surat-keterangan', [
            'pendaftaran' => $pendaftaran
        ]);

        return $pdf->download('surat-keterangan.pdf');
    }

    public function edit($slug)
    {
        $pendaftaran = PendaftaranPasien::where('slug', $slug)->first();

        return view('pendaftaran-pasien.edit', [
            'pendaftaran' => $pendaftaran,
            'dokter' => Dokter::all(),
            'keluhan' => Keluhan::all(),
            'pasien' => User::where('role', 'pasien')->with('biodata')->get()
        ]);
    }

    public function update(Request $request, $slug)
    {
        $pendaftaran = PendaftaranPasien::where('slug', $slug)->first();

        $validatedData = $request->validate([
            'tanggal_pemeriksaan' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'keluhan_id' => 'required|max:255',
            'pasien_id' => 'required|max:255',
            'dokter_id' => 'required|max:255',
        ]);

        $tanggal = \Carbon\Carbon::parse($request->tanggal_pemeriksaan)->format('Ymd');

        $uniqueString = $tanggal .
            \Carbon\Carbon::now()->format('His') .
            Str::random(5);

        $validatedData['kode'] = 'ARS' . $uniqueString;

        $terakhirAntrian = PendaftaranPasien::where('tanggal_pemeriksaan', $request->tanggal_pemeriksaan)
            ->where('dokter_id', $request->dokter_id)
            ->max('nomor_antrian');

        $nomorAntrian = $terakhirAntrian ? $terakhirAntrian + 1 : 1;
        $validatedData['nomor_antrian'] = $nomorAntrian;

        $validatedData['slug'] = SlugService::createSlug(PendaftaranPasien::class, 'slug', $validatedData['kode']);

        PendaftaranPasien::where('id', $pendaftaran->id)->update($validatedData);

        alert()->success('Sukses', "Pendaftaran Pasien berhasil diubah. Nomor Antrian Anda sekarang: $nomorAntrian");
        return redirect('/pendaftaran-pasien');
    }

    public function destroy($slug)
    {
        $pendaftaran = PendaftaranPasien::where('slug', $slug)->first();

        if ($pendaftaran) {
            $pendaftaran->delete();
            alert()->success('Sukses', 'Pendaftaran Pasien berhasil dihapus');
        } else {
            alert()->error('Gagal', 'Data tidak ditemukan atau sudah dihapus');
        }

        return redirect('/pendaftaran-pasien');
    }

    public function storeRekamMedis(Request $request, $slug)
    {
        $pendaftaran = PendaftaranPasien::where('slug', $slug)->first();

        $validatedData = $request->validate([
            'hasil_pemeriksaan' => 'required',
            'diagnosis' => 'required',
            'tindakan_medis' => 'required',
            'resep_obat' => 'nullable',
            'catatan_tambahan' => 'nullable',
            'tekanan_darah' => 'nullable|max:20',
            'suhu_tubuh' => 'nullable|max:10',
            'berat_badan' => 'nullable|max:10',
            'tinggi_badan' => 'nullable|max:10',
        ]);

        $tanggal = now()->format('Ymd');
        $uniqueString = $tanggal . now()->format('His') . Str::random(5);
        $validatedData['kode'] = 'RM' . $uniqueString;
        $validatedData['pendaftaran_id'] = $pendaftaran->id;
        $validatedData['created_by'] = auth()->id();
        $validatedData['slug'] = SlugService::createSlug(RekamMedis::class, 'slug', $validatedData['kode']);

        RekamMedis::create($validatedData);

        alert()->success('Sukses', 'Rekam medis berhasil disimpan');
        return redirect()->route('pendaftaran-pasien.detail', $slug);
    }

    public function updateRekamMedis(Request $request, $slug)
    {
        $pendaftaran = PendaftaranPasien::where('slug', $slug)->first();
        $rekamMedis = $pendaftaran->rekamMedis;

        $validatedData = $request->validate([
            'hasil_pemeriksaan' => 'required',
            'diagnosis' => 'required',
            'tindakan_medis' => 'required',
            'resep_obat' => 'nullable',
            'catatan_tambahan' => 'nullable',
            'tekanan_darah' => 'nullable|max:20',
            'suhu_tubuh' => 'nullable|max:10',
            'berat_badan' => 'nullable|max:10',
            'tinggi_badan' => 'nullable|max:10',
        ]);

        $rekamMedis->update($validatedData);

        alert()->success('Sukses', 'Rekam medis berhasil diperbarui');
        return redirect()->route('pendaftaran-pasien.detail', $slug);
    }
}
