<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import CSV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" >
                @if (session()->has('error'))
                    <div class="p-2 m-2 text-green-900 bg-red-600 bg-opacity-25 rounded-md">
                        {{ session('error') }} 
                    </div>
                @endif

                <div class="p-4 mx-auto mt-3 h-4/5 md:p-8 md:w-3/5">
                    <!-- <h2 class="my-2 text-lg font-semibold text-gray-700">Upload CSV </h2> -->
                    <form action="{{ route('admin.import-posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="file" required name="file" id="file"  >
                        <button class="px-4 py-3 text-right bg-gray-50 sm:px-6" type="submit">Upload</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

