<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     */
    public static function menu(): array
    {
        $menu = [];
        if (auth()->user()) {
            $user = auth()->user();

            if ($user->role == 'admin') {
                $menu = [
                    'dashboard' => [
                        'icon' => 'clipboard-list',
                        'title' => 'Data Pendaftaran',
                        'route_name' => 'admin.dashboard',
                    ],
                    'profil' => [
                        'icon' => 'user',
                        'title' => 'Data Pengguna',
                        'route_name' => 'tabel.profil',
                    ]
                ];
            } else {
                $menu = [
                    'daftar' => [
                        'icon' => 'clipboard-list',
                        'title' => 'Pendaftaran',
                        'route_name' => 'mahasiswa.dashboard',
                    ]
                ];
            }
        }
        return $menu;
    }
}
