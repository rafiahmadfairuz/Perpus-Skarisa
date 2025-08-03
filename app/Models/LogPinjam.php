<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPinjam extends Model
{
    /** @use HasFactory<\Database\Factories\LogPinjamFactory> */
    use HasFactory;
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
