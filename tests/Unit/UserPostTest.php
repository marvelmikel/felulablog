<?php

namespace Tests\Unit;

use App\Http\Livewire\UserPosts;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class UserPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_user_posts()
    {
        // Create a user
        $user = Auth::loginUsingId(1);

        // Create some posts for the user
        Post::factory()->count(15)->create([
            'user_id' => $user->id,
        ]);

        Livewire::actingAs($user)
            ->test(UserPosts::class)
            ->assertViewHas('posts')
            ->assertSee('Post Title') // Replace with the actual post title you expect to see
            ->assertSee('Post Excerpt'); // Replace with the actual post excerpt you expect to see
    }

    /** @test */
    public function it_paginates_user_posts()
    {
        // Create a user
        $user = Auth::loginUsingId(1);

        // Create some posts for the user
        Post::factory()->count(15)->create([
            'user_id' => $user->id,
        ]);

        Livewire::actingAs($user)
            ->test(UserPosts::class)
            ->assertViewHas('posts')
            ->assertSee('Post Title') // Replace with the actual post title you expect to see on the first page
            ->assertDontSee('Post Title') // Replace with the actual post title you expect not to see on the second page
            ->assertSee('2') // Replace with the actual page number you expect to see
            ->assertDontSee('3'); // Replace with the actual page number you expect not to see
    }
}
