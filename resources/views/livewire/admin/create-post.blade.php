@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
@endpush
<div class="p-4 mx-auto mt-3 bg-gray-100 md:p-8 md:w-4/5 md:mt-0">
    <h1 class="mb-3 text-xl font-semibold text-gray-600">
        {{ isset($isEdit) ? "Edit post": "New post" }}
    </h1>

    <form wire:submit.prevent="save">
        <div class="overflow-hidden bg-white rounded-md shadow">
            <div class="px-4 py-3 space-y-8 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="title">
                            {{ __("Post title") }}
                        </x-label>
                        <x-input class="w-full" type="text" wire:model="post.title" placeholder="Post title" />
                        <x-input-error for="post.title" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-label>
                            {{ __("Excerpt") }}
                        </x-label>
                        <x-input type="text" class="w-full" wire:model="post.excerpt" placeholder="Excerpt" />
                        <x-input-error for="post.excerpt" />
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="category_id" class="block text-sm font-medium text-gray-700">
                            {{ __("Category") }}
                        </x-label>
                        <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  id="category_id" wire:model="post.category_id"">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"">{{  $category->name  }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="post.category_id" />
                    </div>
                    <div class="col-span-6 mt-4 sm:col-span-1">
                        <x-label class="text-sm font-medium text-gray-700">
                            <x-input wire:model="post.is_published" type="checkbox" 
                              class="form-checkbox" />
                            {{ __("Publish") }}
                        </x-label>
                        <x-input-error for="post.is_published" />
                    </div>
                </div>
                <div  wire:ignore class="flex flex-col">
                    <x-label for="body">
                        {{ __("Body") }}
                    </x-label>
                    <!-- Tiny mce has issue with tailwind - there's actually a work around -->
                    <textarea id="body" name="body" rows="4" wire:model="post.body"  class="border-gray-300 rounded-sm form-textarea"></textarea>
                  

                </div>
            </div>
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <x-button class="inline-flex justify-center">
                    {{ __(isset($isEdit) && $isEdit ? "Submit": "Next") }}
                </x-button>
            </div>
        </div>
    </form>
</div>

@push('scripts')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
       tinymce.init({
            selector: '#body',
            forced_root_block: false,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('post.body', editor.getContent());
                });
            }
        });
    </script>
   
@endpush

