<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    public $table = "lapangan";
    use HasFactory;
    protected $fillable = [
        'id_lapangan',
        'nama_lapangan',
        'jenis_lapangan',
        'luas_lapangan',
        'tarif_perjam',
        'foto_lapangan',
        'id_provider'
    ];
}
