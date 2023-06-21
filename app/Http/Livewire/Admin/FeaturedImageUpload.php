<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class FeaturedImageUpload extends Component
{
    use WithFileUploads;
    public $photo;
    public $post;

    protected $rules = [
        'photo' => 'required|image'
    ];

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.admin.featured-image-upload');
    }

    public function upload()
    {
        $this->validate();

      
        $current = Carbon::now()->format('YmdHs');
	    $fileExtension = $this->photo->getClientOriginalExtension();
        $nnn =str_replace( $fileExtension, '-'.$current . '.' .$fileExtension,  Str::slug($this->photo->getClientOriginalName()) );
        $fileName = strtoupper($nnn);

        // $path = Storage::putFileAs('resource', $file, $fileName ); //specify sub dir
        $path = Storage::putFileAs('public/images', $this->photo, $fileName );

        $this->post->featured_image = $fileName;
       
        $this->post->save();

        session()->flash("message", "Featured image successfully uploaded");
    }
}