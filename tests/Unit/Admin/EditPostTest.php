<?php

namespace Tests\Unit\Admin;

use App\Http\Livewire\Admin\EditPost;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class EditPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_post_successfully()
    {
        // Create a user
        $user = User::factory()->create();
    
        // Create a post associated with the user
        $post = Post::factory()->create(['user_id' => $user->id]);
    
        // Mock the Livewire component
        Livewire::actingAs($user)
            ->test(EditPost::class, ['id' => $post->id])
            ->set('post.title', 'Updated Title')
            ->set('post.category', 'Updated Category')
            ->set('post.body', 'Updated Body')
            ->set('post.excerpt', 'Updated Excerpt')
            ->set('post.is_published', true)
            ->call('save')
            ->assertRedirect();
    
        // Assert the post was updated in the database
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'category' => 'Updated Category',
            'body' => 'Updated Body',
            'excerpt' => 'Updated Excerpt',
            'is_published' => true,
        ]);
    
        // Assert a success flash message was set
        $this->assertTrue(session()->has('message'));
        $this->assertEquals('Post update successful', session('message'));
    }
   
    
    
    // Add more test methods if needed
}
