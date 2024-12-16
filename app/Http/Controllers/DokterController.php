<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Spesialis;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function dokter()
    {
        return view('dokter.index', [
            'dokter' => Dokter::all()
        ]);
    }

    public function jadwal_dokter()
    {
        return view('dokter.jadwal', [
            'jadwal_dokter' => JadwalDokter::all()
        ]);
    }

    // DOKTER
    public function dokterCreate()
    {
        return view('dokter.create', [
            'spesialis' => Spesialis::all()
        ]);
    }

    public function dokterStore(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:255',
            'nama_dokter' => 'required|max:255',
            'email' => 'required|max:255',
            'nomor_telepon' => 'required|max:255',
            'alamat' => 'required|max:255',
            'spesialis_id' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Dokter::class, 'slug', $validatedData['nama_dokter']);

        Dokter::create($validatedData);

        alert()->success('Sukses', 'Data Dokter berhasil ditambahkan');
        return redirect('/dokter');
    }

    public function dokterEdit($slug)
    {
        $dokter = Dokter::where('slug', $slug)->first();

        return view('dokter.edit', [
            'dokter' => $dokter,
            'spesialis' => Spesialis::all()
        ]);
    }

    public function dokterUpdate(Request $request, $slug)
    {
        $dokter = Dokter::where('slug', $slug)->first();

        $validatedData = $request->validate([
            'kode' => 'required|max:255',
            'nama_dokter' => 'required|max:255',
            'email' => 'required|max:255',
            'nomor_telepon' => 'required|max:255',
            'alamat' => 'required|max:255',
            'spesialis_id' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Dokter::class, 'slug', $validatedData['nama_dokter']);

        Dokter::where('id', $dokter->id)->update($validatedData);

        alert()->success('Sukses', 'Data Dokter berhasil diubah');
        return redirect('/dokter');
    }

    public function dokterDestroy($slug)
    {
        $dokter = Dokter::where('slug', $slug)->first();

        if ($dokter) {
            $dokter->delete();
            alert()->success('Sukses', 'Data Dokter berhasil dihapus');
        } else {
            alert()->error('Gagal', 'Data tidak ditemukan atau sudah dihapus');
        }

        return redirect('/dokter');
    }

    // JADWAL DOKTER
    public function jadwalCreate()
    {
        return view('dokter.jadwalCreate', [
            'dokter' => Dokter::all()
        ]);
    }

    public function jadwalStore(Request $request)
    {
        $validatedData = $request->validate([
            'jadwal_mulai' => 'required|max:255',
            'jadwal_berakhir' => 'required|max:255',
            'dokter_id' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(JadwalDokter::class, 'slug', $validatedData['jadwal_mulai']);

        JadwalDokter::create($validatedData);

        alert()->success('Sukses', 'Data Jadwal Dokter berhasil ditambahkan');
        return redirect('/jadwal-dokter');
    }

    public function jadwalEdit($slug)
    {
        $jadwal_dokter = JadwalDokter::where('slug', $slug)->first();

        return view('dokter.jadwalEdit', [
            'jadwal' => $jadwal_dokter,
            'dokter' => Dokter::all()
        ]);
    }

    public function jadwalUpdate(Request $request, $slug)
    {
        $jadwal_dokter = JadwalDokter::where('slug', $slug)->first();

        $validatedData = $request->validate([
            'jadwal_mulai' => 'required|max:255',
            'jadwal_berakhir' => 'required|max:255',
            'dokter_id' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(JadwalDokter::class, 'slug', $validatedData['jadwal_mulai']);

        JadwalDokter::where('id', $jadwal_dokter->id)->update($validatedData);

        alert()->success('Sukses', 'Data Jadwal Dokter berhasil diubah');
        return redirect('/jadwal-dokter');
    }

    public function jadwalDestroy($slug)
    {
        $jadwal_dokter = JadwalDokter::where('slug', $slug)->first();

        if ($jadwal_dokter) {
            $jadwal_dokter->delete();
            alert()->success('Sukses', 'Data Jadwal Dokter berhasil dihapus');
        } else {
            alert()->error('Gagal', 'Data tidak ditemukan atau sudah dihapus');
        }

        return redirect('/jadwal-dokter');
    }
}
