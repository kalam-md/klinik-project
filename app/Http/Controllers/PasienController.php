<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return view('pasien.index', [
            'pasiens' => User::where('role', 'pasien')->with('biodata')->get()
        ]);
    }
}
