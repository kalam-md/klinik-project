<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\Spesialis;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class SpesialisKeluhanController extends Controller
{
    public function spesialis()
    {
        return view('spesialis.index', [
            'spesialis' => Spesialis::all()
        ]);
    }

    public function keluhan()
    {
        return view('keluhan.index', [
            'keluhans' => Keluhan::all()
        ]);
    }

    // KELUHAN
    public function keluhanCreate()
    {
        return view('keluhan.create');
    }

    public function keluhanStore(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:255',
            'nama_keluhan' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Keluhan::class, 'slug', $validatedData['nama_keluhan']);

        Keluhan::create($validatedData);

        alert()->success('Sukses', 'Data Keluhan pasien berhasil ditambahkan');
        return redirect('/keluhan');
    }

    public function keluhanEdit($slug)
    {
        $keluhan = Keluhan::where('slug', $slug)->first();

        return view('keluhan.edit', [
            'keluhan' => $keluhan
        ]);
    }

    public function keluhanUpdate(Request $request, $slug)
    {
        $keluhan = Keluhan::where('slug', $slug)->first();

        $validatedData = $request->validate([
            'kode' => 'required|max:255',
            'nama_keluhan' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Keluhan::class, 'slug', $validatedData['nama_keluhan']);

        Keluhan::where('id', $keluhan->id)->update($validatedData);

        alert()->success('Sukses', 'Data Keluhan pasien berhasil diubah');
        return redirect('/keluhan');
    }

    public function keluhanDestroy($slug)
    {
        $keluhan = Keluhan::where('slug', $slug)->first();

        if ($keluhan) {
            $keluhan->delete();
            alert()->success('Sukses', 'Data Keluhan pasien berhasil dihapus');
        } else {
            alert()->error('Gagal', 'Data tidak ditemukan atau sudah dihapus');
        }

        return redirect('/keluhan');
    }

    // SPESIALIS
    public function spesialisCreate()
    {
        return view('spesialis.create');
    }

    public function spesialisStore(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:255',
            'nama_spesialis' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Spesialis::class, 'slug', $validatedData['nama_spesialis']);

        Spesialis::create($validatedData);

        alert()->success('Sukses', 'Data Spesialis dokter berhasil ditambahkan');
        return redirect('/spesialis');
    }

    public function spesialisEdit($slug)
    {
        $spesialis = Spesialis::where('slug', $slug)->first();

        return view('spesialis.edit', [
            'spesialis' => $spesialis
        ]);
    }

    public function spesialisUpdate(Request $request, $slug)
    {
        $spesialis = Spesialis::where('slug', $slug)->first();

        $validatedData = $request->validate([
            'kode' => 'required|max:255',
            'nama_spesialis' => 'required|max:255',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Spesialis::class, 'slug', $validatedData['nama_spesialis']);

        Spesialis::where('id', $spesialis->id)->update($validatedData);

        alert()->success('Sukses', 'Data Spesialis dokter berhasil diubah');
        return redirect('/spesialis');
    }

    public function spesialisDestroy($slug)
    {
        $spesialis = Spesialis::where('slug', $slug)->first();

        if ($spesialis) {
            $spesialis->delete();
            alert()->success('Sukses', 'Data Spesialis dokter berhasil dihapus');
        } else {
            alert()->error('Gagal', 'Data tidak ditemukan atau sudah dihapus');
        }

        return redirect('/spesialis');
    }
}
