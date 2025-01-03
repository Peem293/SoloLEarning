<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DiklatDetail extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'gambar',
        'descryption',
        'pengajar',
        'kuota',
        'peserta',
        'jadwal',
        'categories_id',
        'status',
    ];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
