<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feed;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::paginate(15);
        return view('admin.dashboard', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function getUsers()
    {
        $posts = Post::paginate(15);
        return view('admin.users', compact('posts'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function getFeeds()
    {
        $feeds = Feed::paginate(15);
        return view('admin.feeds', compact('feeds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFeed(Request $request)
    {
        Feed::create([
            'link' => $request->link,
            'name' => $request->name
        ]);
        return redirect()->back()->with('message', 'RSS Feed added successfully');
    }


     /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function refreshFeed()
    {
        
        $rsslinks = Feed::all()->pluck('link');        
        foreach($rsslinks  as $rss){
            $feeds = FeedReader::read($rss);

            foreach($feeds->get_items() as $feed) {

                $catogory = Category::firstOrNew([ 'name' =>  $feed->get_category()],[
                    'name' =>  $feed->get_category()
                ]);

                Post::updateOrCreate(
                    [ 'title' => $feed->get_title()],
                    [
                        'title' => $feed->get_title(),
                        'excerpt' => $feed->get_description(),
                        'body' => $feed->get_content(),
                        'link' => $feed->get_link(),
                        'author' => $feed->get_author(),
                        'source' => $feed->get_source(),
                        'pub_date' => $feed->get_gmdate() ,
                        'updated_date' => $feed->get_updated_gmdate(),
                        'category_id' => $catogory->id ?? 1,
                        // 'thumbnail' => $feed->get_thumbnail() ? $feed->get_thumbnail()[0] : null,
                    ]
                );
            }
        }
        return redirect()->back();
    }



}
