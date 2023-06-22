<div class="p-4 mx-auto mt-3 bg-gray-100 md:p-8 md:w-4/5 md:mt-0">
    <h1 class="mb-3 text-xl font-semibold text-gray-600">
        {{ isset($isEdit) ? "Edit post": "New User" }}
    </h1>

    <form wire:submit.prevent="save">
        <div class="overflow-hidden bg-white rounded-md shadow">
            <div class="px-4 py-3 space-y-8 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="title">
                            {{ __("User Name") }}
                        </x-label>
                        <x-input class="w-full" type="text" wire:model="user.name" placeholder="User Name" />
                        <x-input-error for="user.name" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-label>
                            {{ __("Email") }}
                        </x-label>
                        <x-input type="text" class="w-full" wire:model="user.email" placeholder="Email" />
                        <x-input-error for="user.email" />
                    </div>

                    <div  class="col-span-6 sm:col-span-3 {{ isset($isEdit) && $isEdit ? 'hidden': ''  }}">
                        <x-label>
                            {{ __("Password") }}
                        </x-label>
                        <x-input type="text" class="w-full" wire:model="user.password" placeholder="Password" />
                        <x-input-error for="user.password" />
                    </div>

                </div>
             
            </div>
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <x-button class="inline-flex justify-center">
                    {{ __(isset($isEdit) && $isEdit ? "Submit": "Save") }}
                </x-button>
            </div>
        </div>
    </form>
</div>
