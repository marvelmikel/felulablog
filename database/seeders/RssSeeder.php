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
            ['name' => 'US general', 'link' => 'http://feeds.abcnews.com/abcnews/usheadlines'],
            ['name' => 'UK general', 'link' => 'http://rss.cnn.com/rss/cnn_topstories.rss'],
            ['name' => 'BE general', 'link' => 'http://feeds.abcnews.com/abcnews/usheadlines'],
            ['name' => 'BG general', 'link' => 'http://rss.cnn.com/rss/cnn_topstories.rss'],
            ['name' => 'HR general', 'link' => 'http://rss.csmonitor.com/feeds/usa'],
            ['name' => 'CZ general', 'link' => 'http://feeds.nbcnews.com/feeds/topstories'],
            ['name' => 'DK general', 'link' => 'http://hosted.ap.org/lineups/USHEADS.rss'],
            ['name' => 'EE general', 'link' => ' http://online.wsj.com/xml/rss/3_7085.xml'],
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
