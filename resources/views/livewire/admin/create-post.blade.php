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
                        <x-label for="category" class="block text-sm font-medium text-gray-700">
                            {{ __("Category") }}
                        </x-label>
                        <x-input id="category" wire:model="post.category" type="text"
                            placeholder="Category" class="w-full" />
                        <x-input-error for="post.category" />
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
                <div class="flex flex-col">
                    <x-label for="body">
                        {{ __("Body") }}
                    </x-label>
                    <textarea id="body" rows="4" wire:model="post.body" 
                       ﻿class="border-gray-300 rounded-sm form-textarea">
                    ﻿</textarea>
                    <x-input-error for="post.body" />
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
