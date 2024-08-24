<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_provinsi'];

    // Jika Anda ingin memastikan model menggunakan tabel 'provinsi'
    protected $table = 'provinsi';

    public function kabupatenKota()
    {
        return $this->hasMany(KabupatenKota::class);
    }
}
