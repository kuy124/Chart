<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerformancesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('performances')->insert([
            ['year' => '2004', 'sales' => 1000, 'expenses' => 400],
            ['year' => '2005', 'sales' => 1170, 'expenses' => 460],
            ['year' => '2006', 'sales' => 660, 'expenses' => 1120],
            ['year' => '2007', 'sales' => 1030, 'expenses' => 540],
        ]);
    }
}
