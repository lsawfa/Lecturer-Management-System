<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'nama_aktivitas', 'tahun_ajaran', 'tanggal_mulai', 'tanggal_berakhir', 'sks_hasil', 'jumlah_volume_kegiatan','angka_kredit','path_lampiran','jenis_lampiran','no_penugasan','user_id'
    ];
}
