<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\KabupatenKota;
use App\Models\Pengguna;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function admin()
    {
        $users =
            Pengguna::leftJoin('agama', 'pengguna.id_agama', '=', 'agama.id')
            ->leftJoin('provinsi as provinsi_asal', 'pengguna.id_provinsi', '=', 'provinsi_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_asal', 'pengguna.id_kotkab', '=', 'kabupaten_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_lahir', 'pengguna.id_kotkab_lahir', '=', 'kabupaten_lahir.id')
            ->leftJoin('provinsi as provinsi_lahir', 'pengguna.id_provinsi_lahir', '=', 'provinsi_lahir.id')
            ->where('status_user', 'terdaftar')
            ->get([
                'pengguna.*',
                'agama.agama as agama',
                'provinsi_asal.nama_provinsi as provinsi_asal_nama',
                'kabupaten_asal.nama_kabupaten_kota as kabupaten_asal_nama',
                'kabupaten_lahir.nama_kabupaten_kota as kabupaten_lahir_nama',
                'provinsi_lahir.nama_provinsi as provinsi_lahir_nama'
            ]);

        return view('dashboard.admin.datapendaftar', compact('users')); // Halaman untuk admin
    }

    public function getData($id)
    {
        $user =
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
        return view('dashboard.mahasiswa.statusdaftar', compact('user'));
    }

    public function formEdit($id)
    {
        $agama = Agama::all();
        $provinsi = Provinsi::all();
        $kabkot = KabupatenKota::all();
        $user =
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
        return view('dashboard.mahasiswa.pendaftaran', compact('agama', 'provinsi', 'kabkot', 'user'));
    }

    public function mahasiswa()
    {
        $agama = Agama::all();
        $provinsi = Provinsi::all();
        $kabkot = KabupatenKota::all();
        if (auth()->user()->status_user == 'terdaftar') {
            $user =
                Pengguna::leftJoin('agama', 'pengguna.id_agama', '=', 'agama.id')
                ->leftJoin('provinsi as provinsi_asal', 'pengguna.id_provinsi', '=', 'provinsi_asal.id')
                ->leftJoin('kabupaten_kota as kabupaten_asal', 'pengguna.id_kotkab', '=', 'kabupaten_asal.id')
                ->leftJoin('kabupaten_kota as kabupaten_lahir', 'pengguna.id_kotkab_lahir', '=', 'kabupaten_lahir.id')
                ->leftJoin('provinsi as provinsi_lahir', 'pengguna.id_provinsi_lahir', '=', 'provinsi_lahir.id')
                ->where('pengguna.id', auth()->user()->id)
                ->first([
                    'pengguna.*',
                    'agama.agama as agama',
                    'provinsi_asal.nama_provinsi as provinsi_asal_nama',
                    'kabupaten_asal.nama_kabupaten_kota as kabupaten_asal_nama',
                    'kabupaten_lahir.nama_kabupaten_kota as kabupaten_lahir_nama',
                    'provinsi_lahir.nama_provinsi as provinsi_lahir_nama'
                ]);

            return view('dashboard.mahasiswa.statusdaftar', compact('user'));
        }
        return view('dashboard.mahasiswa.pendaftaran', compact('agama', 'provinsi', 'kabkot')); // Halaman untuk mahasiswa
    }

    public function formdaftar()
    {
        $agama = Agama::all();
        $provinsi = Provinsi::all();
        $kabkot = KabupatenKota::all();
        return view('dashboard.mahasiswa.pendaftaran', compact('agama', 'provinsi', 'kabkot')); // Halaman untuk mahasiswa
    }

    public function statusdaftar()
    {

        $user =
            Pengguna::leftJoin('agama', 'pengguna.id_agama', '=', 'agama.id')
            ->leftJoin('provinsi as provinsi_asal', 'pengguna.id_provinsi', '=', 'provinsi_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_asal', 'pengguna.id_kotkab', '=', 'kabupaten_asal.id')
            ->leftJoin('kabupaten_kota as kabupaten_lahir', 'pengguna.id_kotkab_lahir', '=', 'kabupaten_lahir.id')
            ->leftJoin('provinsi as provinsi_lahir', 'pengguna.id_provinsi_lahir', '=', 'provinsi_lahir.id')
            ->where('pengguna.id', auth()->user()->id)
            ->first([
                'pengguna.*',
                'agama.agama as agama',
                'provinsi_asal.nama_provinsi as provinsi_asal_nama',
                'kabupaten_asal.nama_kabupaten_kota as kabupaten_asal_nama',
                'kabupaten_lahir.nama_kabupaten_kota as kabupaten_lahir_nama',
                'provinsi_lahir.nama_provinsi as provinsi_lahir_nama'
            ]);

        return view('dashboard.mahasiswa.statusdaftar', compact('user'));
    }

    public function getKabkot($provinsi_id)
    {
        try {
            $kabkot = KabupatenKota::where('provinsi_id', $provinsi_id)->get();

            // Pastikan data berhasil ditemukan
            if ($kabkot->isEmpty()) {
                return response()->json(['message' => 'Kabupaten/Kota tidak ditemukan'], 404);
            }

            // Kembalikan data dalam bentuk JSON
            return response()->json($kabkot);
        } catch (\Exception $e) {
            // Tangani error internal dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan'], 500);
        }
    }
}
