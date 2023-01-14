<?php

namespace Database\Seeders;

use App\Models\item_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item_category::create([
            'name' => 'Original',
            'description' => 'Commodo proident et elit nulla ut ea.'
        ]);
        item_category::create([
            'name' => 'Request',
            'description' => 'Dolor fugiat voluptate consequat veniam anim sunt deserunt velit velit.'
        ]);
        item_category::create([
            'name' => 'Large',
            'description' => 'Sint ullamco nisi velit veniam sunt sint consequat cupidatat.'
        ]);
    }
}
