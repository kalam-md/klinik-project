<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $biodata = Auth::user()->biodata ?? new Biodata();
        return view('profil.index', compact('biodata'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|unique:users,nomor_telepon,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string'
        ]);

        // Update user
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
        ]);

        // Update atau buat biodata
        $biodata = $user->biodata ?? new Biodata();
        $biodata->fill([
            'user_id' => $user->id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat
        ])->save();

        alert()->success('Sukses', 'Profil berhasil diperbarui');
        return redirect()->route('profil');
    }
}
