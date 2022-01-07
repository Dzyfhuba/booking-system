<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JLapangan extends Model
{
    use HasFactory;
    public $table = "jenis_lapangan";
    protected $fillable = [
        'id',
        'jenis_lapangan'
    ];
}
