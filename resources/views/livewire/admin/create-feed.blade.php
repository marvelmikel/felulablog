<div class="p-4 mx-auto mt-3 bg-gray-100 md:p-8 md:w-4/5 md:mt-0">
    <h1 class="mb-3 text-xl font-semibold text-gray-600">
        New Feed
    </h1>

    <form wire:submit.prevent="save">
        <div class="overflow-hidden bg-white rounded-md shadow">
            <div class="px-4 py-3 space-y-8 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="title">
                            {{ __("Name") }}
                        </x-label>
                        <x-input class="w-full" type="text" wire:model="feed.name" placeholder="Feed Name" />
                        <x-input-error for="feed.name" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-label>
                            {{ __("Link") }}
                        </x-label>
                        <x-input type="text" class="w-full" wire:model="feed.link" placeholder="Link" />
                        <x-input-error for="feed.link" />
                    </div>
                    
                </div>
             
            </div>
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <x-button class="inline-flex justify-center">
                    Save
                </x-button>
            </div>
        </div>
    </form>
</div>
