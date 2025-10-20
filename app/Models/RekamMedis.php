<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RekamMedis extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'kode'
            ]
        ];
    }

    public function pendaftaran()
    {
        return $this->belongsTo(PendaftaranPasien::class, 'pendaftaran_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}