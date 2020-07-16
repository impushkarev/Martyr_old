<?php

use Illuminate\Database\Seeder;
use App\ItemFilters;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ItemsFiltersSeeder::class);
    }
}

class ItemsFiltersSeeder extends Seeder
{
    public function run()
    {
        ItemFilters::create(['filter' => 'man']);
        ItemFilters::create(['filter' => 'woman']);
    }
} 