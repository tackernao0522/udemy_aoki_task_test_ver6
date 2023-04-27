<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            [
                'name' => '山手線',
                'sort_no' => 1,
            ],
            [
                'name' => '京浜東北線',
                'sort_no' => 2,
            ],
            [
                'name' => '東武東上線線',
                'sort_no' => 3,
            ],
        ]);
    }
}