<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <!-- <x-application-logo class="block h-12 w-auto" /> -->
        <!-- <x-application-mark class="block h-9 w-auto" /> -->

        <div class="flex flex-row justify-between">
            <h1 class="mt-8 text-2xl font-medium text-gray-900">All RSS Feeds!</h1>
            <a href="{{ route('admin.createuser') }}" class="px-2 py-1 text-white bg-green-700 h-10 rounded">New</a>
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
        @foreach ($feeds as $feed)
        <div class="shadow-sm bg-white p-5">
            <div class="flex flex-col items-center ">
                <img src="{{ $feed->profile_photo_url }}" alt="">
                <h2 class=" text-xl font-semibold text-gray-900"><a href="">{{ $feed->name }}</a></h2>
            </div>
            
           
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                {{ $feed->excerpt }}
            </p>

            <div class="mt-4 text-sm flex justify-center space-x-2">
                <a href="{{ route('admin.edit-feed', $feed->id) }}"
                    class="bg-blue-600 px-2 py-1.5 text-xs rounded text-white">Edit</a>
                
                <button class="p-1 text-xs text-gray-100 bg-red-600 rounded-sm"
                wire:click="delete({{ $feed->id }})">
                    Delete
                </button> 
            </div>
        </div>
        @endforeach

        <div class="my-3">
            {{ $feeds->links() }}
        </div>
    </div>
</div>
