<article class="flex flex-col mb-2 rounded-md shadow-sm p-10 md:mb-0">
    <a href="{{ route('post-detail', $post->id ) }}">
        <img src='{{ $post->featured_image }}' 
            alt="{{ $post->title }}" class="w-full h-56 rounded-t-md">
    </a>

    
    <div class="p-3">
        <h3 class="text-lg mb-10 font-semibold text-gray-900">
            <a href="{{ route('post-detail', $post->id ) }}">
                {{ $post->title }}
            </a>
        </h3>
        <p class="text-gray-800">
            <a href="{{ route('post-detail', $post->id ) }}">
                {{ $post->body }}
            </a>
        </p>

        <div class="flex mt-10 flex-row justify-between mt-2">
            <small>
                <b>Date</b>: {{ $post->published_date }}
            </small>

            <small>
               <b>Category</b> {{ $post->category->name }}
            </small>
        </div>
    </div>
</article>
