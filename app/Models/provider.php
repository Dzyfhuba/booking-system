<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'nama_tempat',
        'nohp',
        'alamat',
        'bukti_kepemilikan',
    ];


    
}
