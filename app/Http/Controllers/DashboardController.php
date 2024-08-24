<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin'); // Halaman untuk admin
    }

    public function mahasiswa()
    {
        return view('dashboard.mahasiswa'); // Halaman untuk mahasiswa
    }
}
