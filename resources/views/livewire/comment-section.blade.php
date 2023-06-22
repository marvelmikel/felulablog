<div class="text-left">
    <h2 class="mb-4"><strong>Comments</strong></h2>

    <div class="comments" wire:poll="refreshComments">
        @foreach ($comments as $comment)
            <div class="comment">
                <p>{{ $comment->name }}</p>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach
    </div>

    <form wire:submit.prevent="addComment" class="max-w-md mx-auto mt-8">
        <div class="mb-4">
            <label for="name" class="block">Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded" />
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" id="email" wire:model="email" class="w-full px-4 py-2 border rounded" />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="comment" class="block">Comment</label>
            <textarea id="comment" wire:model="comment" class="w-full px-4 py-2 border rounded"></textarea>
            @error('comment') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Comment</button>
    </form>
</div>

@push('scripts')
    <script>
        window.addEventListener('commentAdded', event => {
            Livewire.emit('refreshComments');
        });
    </script>
@endpush