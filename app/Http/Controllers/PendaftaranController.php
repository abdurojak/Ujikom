<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function pendaftaran(Request $request)
    {
        $uid = Str::uuid();
        $filefoto = $request->file('file_img');
        if ($filefoto) {
            $filefotoPath = $filefoto->store('public');
            $filefotohashed = str_replace('public/', 'storage/', $filefotoPath);
        } else {
            $filefotohashed = auth()->user()->file_img;
        }

        $tbldaftar = Pengguna::findOrFail(auth()->user()->id);
        $tbldaftar->name = $request->name;
        $tbldaftar->email = $request->email;
        $tbldaftar->alamat_ktp = $request->alamat_ktp;
        $tbldaftar->alamat_domisili = $request->alamat_domisili;
        $tbldaftar->id_provinsi = $request->provinsi;
        $tbldaftar->id_kotkab = $request->kabupaten_kota;
        $tbldaftar->kecamatan = $request->kecamatan;
        $tbldaftar->nohp = $request->nohp;
        $tbldaftar->notelp = $request->notelp;
        $tbldaftar->kewarnegaraan = $request->kewarnegaraan;
        $tbldaftar->kewarnegaraan_negara = $request->kewarnegaraan_negara;
        $tbldaftar->tgl_lahir = $request->tgl_lahir;
        $tbldaftar->tempat_lahir = $request->tempat_lahir;
        $tbldaftar->id_provinsi_lahir = $request->id_provinsi_lahir;
        $tbldaftar->id_kotkab_lahir = $request->id_kotkab_lahir;
        $tbldaftar->negara = $request->negara;
        $tbldaftar->jk = $request->jk;
        $tbldaftar->menikah = $request->menikah;
        $tbldaftar->id_agama = $request->id_agama;
        $tbldaftar->file_img = $filefotohashed;
        $tbldaftar->uid = $uid;
        $tbldaftar->status_user = 'terdaftar';
        $tbldaftar->save();
        return redirect()->route('mahasiswa.status')->with('success', 'Pendaftaran Berhasil');
    }
}
