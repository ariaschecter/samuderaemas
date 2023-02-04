<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function image() {
        return $this->hasMany(Image::class, 'usaha_id', 'id');
    }
}
