<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'kd_klasifikasi_id',
        'nomor',
        'tgl',
        'perihal',
        'pencipta',
        'unit_pengolah',
        'uraian',
        'lokal',
        'jenis_media',
        'ket_keaslian',
        'jumlah',
        'no_rak',
        'no_box',
        'retensi',
        'retensi2',
        'retensi3',
        'file',
        'created_by', 
        'updated_by', 
        'tujuan', 
		  'ttd', 
    ];

    public function klasifikasi() {
        return $this->hasOne(kd_klasifikasi::class, 'id', 'kd_klasifikasi_id');
    }

    // public function penciptaSurat() {
    //     return $this->hasOne(JenisKlasifikasi::class, 'id', 'pencipta');
    // }

    public function cipta() {
        return $this->hasOne(kd_unit::class, 'id', 'pencipta');
    }

    public function unit() {
        return $this->hasOne(kd_unit::class, 'id', 'unit_pengolah');
    }

    public function lokasi() {
        return $this->hasOne(kd_unit::class, 'id', 'lokal');
    }
}
