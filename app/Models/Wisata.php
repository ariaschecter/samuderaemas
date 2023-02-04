<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function image() {
        return $this->hasMany(Image::class, 'wisata_id', 'id');
    }

    public function tiket() {
        return $this->hasMany(Tiket::class, 'wisata_id', 'id');
    }
}
