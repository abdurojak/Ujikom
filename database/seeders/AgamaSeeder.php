<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agama = [
            ['agama' => 'Islam'],
            ['agama' => 'Katolik'],
            ['agama' => 'Kristen'],
            ['agama' => 'Hindu'],
            ['agama' => 'Budha'],
            ['agama' => 'Lain-lain'],
        ];

        DB::table('agama')->insert($agama);
    }
}
