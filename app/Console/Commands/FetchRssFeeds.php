<?php

namespace App\Console\Commands;

use App\Http\Controllers\AdminController;
use Illuminate\Console\Command;

class FetchRssFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-rss-feeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new AdminController();
        $controller->refreshFeed();
    }
}
