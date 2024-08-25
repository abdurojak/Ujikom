<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $users =
            Pengguna::leftJoin('agama', 'pengguna.id_agama', '=', 'agama.id')
            ->leftJoin('provinsi as provinsi_asal', 'pengguna.id_provinsi', '=', 'provinsi_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_asal', 'pengguna.id_kotkab', '=', 'kabupaten_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_lahir', 'pengguna.id_kotkab_lahir', '=', 'kabupaten_lahir.id')
            ->leftJoin('provinsi as provinsi_lahir', 'pengguna.id_provinsi_lahir', '=', 'provinsi_lahir.id')
            ->get([
                'pengguna.*',
                'agama.agama as agama',
                'provinsi_asal.nama_provinsi as provinsi_asal_nama',
                'kabupaten_asal.nama_kabupaten_kota as kabupaten_asal_nama',
                'kabupaten_lahir.nama_kabupaten_kota as kabupaten_lahir_nama',
                'provinsi_lahir.nama_provinsi as provinsi_lahir_nama'
            ]);
        return view('dashboard.admin.profilpengguna', compact('users')); // Halaman untuk update profil
    }
    public function updateProfil($id)
    {
        $users =
            Pengguna::leftJoin('agama', 'pengguna.id_agama', '=', 'agama.id')
            ->leftJoin('provinsi as provinsi_asal', 'pengguna.id_provinsi', '=', 'provinsi_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_asal', 'pengguna.id_kotkab', '=', 'kabupaten_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_lahir', 'pengguna.id_kotkab_lahir', '=', 'kabupaten_lahir.id')
            ->leftJoin('provinsi as provinsi_lahir', 'pengguna.id_provinsi_lahir', '=', 'provinsi_lahir.id')
            ->where('pengguna.id', $id)
            ->first([
                'pengguna.*',
                'agama.agama as agama',
                'provinsi_asal.nama_provinsi as provinsi_asal_nama',
                'kabupaten_asal.nama_kabupaten_kota as kabupaten_asal_nama',
                'kabupaten_lahir.nama_kabupaten_kota as kabupaten_lahir_nama',
                'provinsi_lahir.nama_provinsi as provinsi_lahir_nama'
            ]);
        return view('dashboard.admin.updateprofil', compact('users')); // Halaman untuk update profil
    }

    public function tambahAkun()
    {
        return view('dashboard.admin.updateprofil');
    }

    public function saveAkun(Request $request)
    {
        $user = new Pengguna();
        if ($request->id != '') {
            $user =
                Pengguna::findOrFail($request->id);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        if ($request->password != null) {
            $hashedPassword = Hash::make($request->password);
            $user->password = $hashedPassword;
        }
        $user->save();
        return redirect()->route('tabel.profil')->with('success', 'Berhasil Simpan Data');
    }

    public function hapusAkun($id)
    {
        $user = Pengguna::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }
}
