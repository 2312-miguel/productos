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
        $this->call(ProductoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(StockSeeder::class);
    }
}
