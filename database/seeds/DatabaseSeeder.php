<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UsersTableSeeder::class,
                ContactFormsTableSeeder::class,
                AreasTableSeeder::class,
                ShopsTableSeeder::class,
                RoutesTableSeeder::class,
                RouteShopTableSeeder::class,
            ]
        );
    }
}
