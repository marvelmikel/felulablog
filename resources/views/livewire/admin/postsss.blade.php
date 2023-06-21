<div class="m-4">
    <div class="flex flex-row justify-between">
        <h2 class="text-xl font-bold text-gray-600">Posts</h2>
        <a href="{{ route('admin.createpost') }}" class="px-2 py-1 text-white bg-green-700 rounded">New</a>
    </div>
    
    <div class="p-10">
        <!-- Session checks -->
        @if (session()->has('message'))
            <!-- Show message -->
            <div class="p-2 text-green-900 bg-green-600 bg-opacity-25 rounded-md">{{ session('message') }}</div>
        @endif
        <table class="table w-full">
            <thead class="text-sm text-gray-600 border-b border-gray-200">
                
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody class="text-sm text-gray-600">
                @foreach ($posts as $post)
                <tr class=" p-4 m-10 border-b border-gray-200 hover:bg-gray-100">
                   
                    <td>
                        {{ ucwords($post->title) }}
                    </td>
                    <td class="text-center">
                        {{ $post->is_published ? "Published" : "Pending" }}
                    </td>
                    <td class="text-center">
                        <button class="p-1 text-xs text-gray-100 bg-red-600 rounded-sm"
                        wire:click="delete({{ $post->id }})">
                            Delete
                        </button>
                        <button class="p-1 text-xs text-gray-100 bg-yellow-700 rounded-sm" wire:click="publish({{ $post->id }})">
                            {{ !$post->is_published ? "Publish" : "Unpublish" }}
                        </button>
                        <a href="{{ route('admin.edit-post', $post->id) }}"
                            class="bg-blue-600 px-2 py-1.5 text-xs rounded text-white">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-3">
            {{ $posts->links() }}
        </div>
    </div>
</div>