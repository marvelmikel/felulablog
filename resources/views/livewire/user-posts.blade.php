<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <!-- <x-application-logo class="block h-12 w-auto" /> -->
        <!-- <x-application-mark class="block h-9 w-auto" /> -->

        <div class="flex flex-row justify-between">
            <h1 class="mt-8 text-2xl font-medium text-gray-900">My Posts!</h1>
            <a href="{{ route('user.createpost') }}" class="px-2 py-1 text-white bg-green-700 h-10 rounded">Add New Post</a>
        </div>

      

        <p class="mt-6 text-gray-500 leading-relaxed">
            <!-- Session checks -->
            @if (session()->has('message'))
                <!-- Show message -->
                <div class="p-2 text-green-900 bg-green-600 bg-opacity-25 rounded-md">{{ session('message') }}</div>
            @endif

            @if (session()->has('error'))
                <div class="p-2 m-2 text-green-900 bg-red-600 bg-opacity-25 rounded-md">
                    {{ session('error') }} 
                </div>
            @endif
        </p>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        @foreach ($posts as $post)
        <div class="shadow-sm bg-white p-5">
            <div class="flex items-center">
            
                <h2 class=" text-xl font-semibold text-gray-900">
                    <a href="{{route('post-detail', $post->id)}}">{{ $post->title }}</a>
                </h2>
            </div>

            <div class="my-4 flex justify-between">
                <span><b>Author:</b> John Doe</span>
                @if($post->is_published)
                    <span><b>Published: </b>{{ $post->published_date->diffForHumans() }}</span>
                @else
                    <span><b>Created: </b>{{ $post->created_at->diffForHumans() }}</span>
                @endif
            </div>

            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                {{ $post->excerpt }}
            </p>

            <p class="mt-4 text-sm">
                <a href="{{ route('user.edit-post', $post->id) }}"
                    class="bg-blue-600 px-2 py-1.5 text-xs rounded text-white">Edit</a>
               
                <button class="p-1 text-xs text-gray-100 bg-red-600 rounded-sm"
                wire:click="delete({{ $post->id }})">
                    Delete
                </button>

                <span class="p-1 text-xs text-gray-100  rounded-smn {{ $post->is_published ? 'bg-green-700' : 'bg-yellow-500'   }}" >
                    {{ $post->is_published ? "Published" : "Unpublished" }}
                </span>
                
            </p>
        </div>
        @endforeach

        <div class="my-3">
            {{ $posts->links() }}
        </div>
    </div>
</div>
