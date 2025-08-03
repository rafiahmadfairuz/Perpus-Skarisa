<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sirkulasi extends Model
{
    /** @use HasFactory<\Database\Factories\SirkulasiFactory> */
    use HasFactory;
    protected $primaryKey = 'id_sirkulasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, "id_buku");
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, "id_anggota");
    }
}
