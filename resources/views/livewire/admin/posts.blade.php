<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <!-- <x-application-logo class="block h-12 w-auto" /> -->
        <!-- <x-application-mark class="block h-9 w-auto" /> -->

        <div class="flex flex-row justify-between">
            <h1 class="mt-8 text-2xl font-medium text-gray-900">All Posts!</h1>
            <a href="{{ route('admin.createpost') }}" class="px-2 py-1 text-white bg-green-700 h-10 rounded">New</a>
        </div>

        <p class="mt-6 text-gray-500 leading-relaxed">
        
            <!-- Session checks -->
            @if (session()->has('message'))
                <!-- Show message -->
                <div class="p-2 text-green-900 bg-green-600 bg-opacity-25 rounded-md">{{ session('message') }}</div>
            @endif
        </p>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        @foreach ($posts as $post)
        <div>
            <div class="flex items-center">
            
                <h2 class="ml-3 text-xl font-semibold text-gray-900">
                    <a href="https://laravel.com/docs">{{ $post->title }}</a>
                </h2>
            </div>

            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                {{ $post->excerpt }}
            </p>

            <p class="mt-4 text-sm">
                <a href="{{ route('admin.edit-post', $post->id) }}"
                    class="bg-blue-600 px-2 py-1.5 text-xs rounded text-white">Edit</a>
                <button class="p-1 text-xs text-gray-100 bg-yellow-700 rounded-sm" wire:click="publish({{ $post->id }})">
                    {{ !$post->is_published ? "Publish" : "Unpublish" }}
                </button>
                <button class="p-1 text-xs text-gray-100 bg-red-600 rounded-sm"
                wire:click="delete({{ $post->id }})">
                    Delete
                </button>
                
            </p>
        </div>
        @endforeach

        <div class="my-3">
            {{ $posts->links() }}
        </div>
    </div>
</div>