<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Keluhan;
use App\Models\Spesialis;
use App\Models\Dokter;
use App\Models\JadwalDokter;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // === USERS ===
        User::create([
            'nama_lengkap'   => 'Admin Klinik',
            'nomor_telepon'  => '081234567890',
            'email'          => 'admin@mail.com',
            'role'           => 'admin',
            'password'       => Hash::make('admin123'),
        ]);

        $users = [
            [
                'nama_lengkap'  => 'Kalam Mahardhika',
                'nomor_telepon' => '087708956070',
                'email'         => 'kalam@example.com',
                'password'      => Hash::make('user123'),
            ],
            [
                'nama_lengkap'  => 'Rina Wulandari',
                'nomor_telepon' => '081223344556',
                'email'         => 'rina@example.com',
                'password'      => Hash::make('user123'),
            ],
            [
                'nama_lengkap'  => 'Budi Santoso',
                'nomor_telepon' => '082112223334',
                'email'         => 'budi@example.com',
                'password'      => Hash::make('user123'),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        // === BIODATAS ===
        foreach (User::where('role', 'pasien')->get() as $user) {
            Biodata::create([
                'user_id'       => $user->id,
                'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                'alamat'        => fake()->address(),
                'tanggal_lahir' => fake()->date('Y-m-d', '2005-12-31'),
            ]);
        }

        // === KELUHANS ===
        $keluhans = [
            ['kode' => 'K001', 'slug' => 'demam', 'nama_keluhan' => 'Demam'],
            ['kode' => 'K002', 'slug' => 'batuk', 'nama_keluhan' => 'Batuk'],
            ['kode' => 'K003', 'slug' => 'flu', 'nama_keluhan' => 'Flu'],
            ['kode' => 'K004', 'slug' => 'sakit-kepala', 'nama_keluhan' => 'Sakit Kepala'],
        ];
        foreach ($keluhans as $keluhan) {
            Keluhan::create($keluhan);
        }

        // === SPESIALIS ===
        $spesialisList = [
            ['kode' => 'S001', 'slug' => 'umum', 'nama_spesialis' => 'Dokter Umum'],
            ['kode' => 'S002', 'slug' => 'anak', 'nama_spesialis' => 'Spesialis Anak'],
            ['kode' => 'S003', 'slug' => 'gigi', 'nama_spesialis' => 'Dokter Gigi'],
        ];
        foreach ($spesialisList as $sp) {
            Spesialis::create($sp);
        }

        // === DOKTER ===
        $dokters = [
            [
                'kode'           => 'D001',
                'nama_dokter'    => 'Dr. Andi Pratama',
                'slug'           => 'dr-andi-pratama',
                'email'          => 'andi@klinik.com',
                'nomor_telepon'  => '081234111222',
                'alamat'         => 'Jl. Melati No. 10, Bandung',
                'spesialis_id'   => 1,
            ],
            [
                'kode'           => 'D002',
                'nama_dokter'    => 'Dr. Rani Kusuma',
                'slug'           => 'dr-rani-kusuma',
                'email'          => 'rani@klinik.com',
                'nomor_telepon'  => '081234111333',
                'alamat'         => 'Jl. Mawar No. 12, Bandung',
                'spesialis_id'   => 2,
            ],
            [
                'kode'           => 'D003',
                'nama_dokter'    => 'Drg. Taufik Rahman',
                'slug'           => 'drg-taufik-rahman',
                'email'          => 'taufik@klinik.com',
                'nomor_telepon'  => '081234111444',
                'alamat'         => 'Jl. Kenanga No. 14, Bandung',
                'spesialis_id'   => 3,
            ],
        ];
        foreach ($dokters as $dokter) {
            Dokter::create($dokter);
        }

        // === JADWAL DOKTER ===
        $jadwals = [
            [
                'slug' => 'jadwal-dr-andi-senin',
                'jadwal_mulai' => '08:00',
                'jadwal_berakhir' => '12:00',
                'dokter_id' => 1,
            ],
            [
                'slug' => 'jadwal-dr-rani-selasa',
                'jadwal_mulai' => '09:00',
                'jadwal_berakhir' => '13:00',
                'dokter_id' => 2,
            ],
            [
                'slug' => 'jadwal-drg-taufik-rabu',
                'jadwal_mulai' => '10:00',
                'jadwal_berakhir' => '14:00',
                'dokter_id' => 3,
            ],
        ];
        foreach ($jadwals as $jd) {
            JadwalDokter::create($jd);
        }
    }
}
