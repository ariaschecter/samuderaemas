<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kegiatan() {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }

    public function wisata() {
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id');
    }
}
