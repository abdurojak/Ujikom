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
                        'icon' => 'hard-drive',
                        'title' => 'Dashboard',
                        'route_name' => 'admin.dashboard',
                    ],
                    'profil' => [
                        'icon' => 'user',
                        'title' => 'Pengguna',
                        'route_name' => 'tabel.profil',
                    ]
                ];
            } else {
                $menu = [
                    'widgets' => [
                        'icon' => 'hard-drive',
                        'title' => 'Dashboard',
                        'route_name' => 'mahasiswa.dashboard',
                    ]
                ];
            }
        }
        return $menu;
    }
}
