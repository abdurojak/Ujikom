<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;

    protected $fillable = ['provinsi_id', 'nama_kabupaten_kota'];

    protected $table = 'kabupaten_kota';
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
