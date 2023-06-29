<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'tabungans_id',
        'nama'
    ];

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'jenistransaksis_id', 'id');
    }
}
