<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $path = public_path('storage/images');

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   

        $path = storage_path('public/images');

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            RssSeeder::class,
        ]);
    }
}
