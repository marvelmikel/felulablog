<div class="flex flex-wrap -mx-2">
           
    @foreach($posts as $item)
     
     <div class="w-full sm:w-1/2 md:w-1/2 self-stretch p-2 mb-2">
         
         <div class="{{ $item->is_read ? 'rounded shadow-md h-full bg-gray-200' : 'rounded shadow-md h-full'  }}" ><a href="/typography/">
             <!-- <img class="w-full h-60 m-0 rounded-t lazy" src="https://picsum.photos/00/300"  alt="This post thumbnail"> -->
             </a>
             <div class="px-6 py-5">
                 <div class="font-semibold text-lg mb-2"><a class="text-gray-900 hover:text-gray-700" href="{{route('post-detail', $item->id)}}">{{$item->title}}</a></div>
                 <p class="text-gray-700 my-5" title="Published date">{{ $item->published_date}}</p>
                 <p class="text-gray-800">{!! $item->excerpt !!}</p>
             </div>


           
             <a href="{{route('post-detail', $item->id)}}" class="px-2 py-1 ml-1 text-xs font-semibold bg-teal-300 text-teal-800 rounded-full">Read More</a>
           

         </div>

    
     </div>
     @endforeach


    <div class="mt-3 flow-root">
        {{ $posts->links() }}
     </div>
       

 </div>
         
