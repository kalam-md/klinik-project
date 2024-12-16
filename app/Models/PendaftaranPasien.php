<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PendaftaranPasien extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'kode'
            ]
        ];
    }

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }

    public function keluhan()
    {
        return $this->belongsTo(Keluhan::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
