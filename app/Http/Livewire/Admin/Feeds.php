<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Feed;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Vedmant\FeedReader\Facades\FeedReader;

class Feeds extends Component
{
    use WithPagination;

    public function render()
    {
        $feeds = Feed::latest()->paginate(10);
        return view('livewire.admin.feeds', ['feeds' => $feeds]);
    }

    public function delete(int $id)
    {
        $user = Feed::find($id);
        $user->delete();
        session()->flash("message", "Feed has been deleted");
    }

    public function refresh(int $id)
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

        return redirect()->route('admin.feeds');
    }

    
}
