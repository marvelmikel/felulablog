<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feed;

class RssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample RSS feeds
        $feeds = [
            ['name' => 'US general', 'link' => 'https://www.chron.com/rss/feed/AP-Technology-and-Science-266.php'],
            ['name' => 'UK general', 'link' => 'https://abcnews.go.com/abcnews/usheadlines'],
            ['name' => 'BE general', 'link' => 'https://abcnews.go.com/abcnews/usheadlines'],
            // Add more RSS feeds as needed
        ];

        // Seed the feeds
        foreach ($feeds as $feed) {
            Feed::create([
                'name' => $feed['name'],
                'link' => $feed['link'],
            ]);
        }
    }
}
