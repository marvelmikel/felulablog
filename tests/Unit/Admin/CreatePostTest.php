<?php

namespace Tests\Unit\Admin;

use App\Http\Livewire\Admin\CreatePost;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_saves_post_successfully()
    {
        // Mock authenticated user
        $user = Auth::loginUsingId(1);

        Livewire::actingAs($user)
            ->test(CreatePost::class)
            ->set('post', [
                'title' => 'Test Post',
                'excerpt' => 'This is the excerpt',
                'category' => 'Test Category',
                'body' => 'This is the post body',
                'is_published' => true,
            ])
            ->call('save')
            ->assertRedirect(route('upload-featured-image', ['id' => 1]));

        // Assert that the post was created and saved in the database
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'excerpt' => 'This is the excerpt',
            'category' => 'Test Category',
            'body' => 'This is the post body',
            'user_id' => $user->id,
            'is_published' => true,
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        Livewire::test(CreatePost::class)
            ->call('save')
            ->assertHasErrors([
                'post.title' => 'required',
                'post.category' => 'required',
                'post.body' => 'required',
                'post.excerpt' => 'required',
                'post.is_published' => 'boolean',
            ]);
    }
}
