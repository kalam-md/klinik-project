<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Keluhan;
use App\Models\Spesialis;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $totalAkun   = User::count();
        $totalDokter = Dokter::count();
        $totalPasien = User::where('role', 'pasien')->count();
        $totalSpesialis = Spesialis::count();
        $totalKeluhan   = Keluhan::count();

        return view('beranda.index', compact(
            'totalAkun',
            'totalDokter',
            'totalPasien',
            'totalSpesialis',
            'totalKeluhan'
        ));
    }
}
