<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::updateOrCreate(['slug' => 'general'],[
            'name' => 'General',
            'slug' => 'general',
            'description' => '',
        ]);

        \App\Models\Category::updateOrCreate(['slug' => 'technology'],[
            'name' => 'Technology',
            'slug' => 'technology',
            'description' => '',
        ]);

        \App\Models\Category::updateOrCreate(['slug' => 'education'],[
            'name' => 'Education',
            'slug' => 'education',
            'description' => '',
        ]);
    }
}
