<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-xl sm:rounded-lg">
                <x-section-title title="{{ $post->title }}" description="#{{ $post->id }}" />
                <div>
                    <p>{{ $post->body }}</p>
                </div>
            </div>
            <div class="bg-white mt-4 p-4 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('comments.form', ['post' => $post])
                @livewire('comments.index', ['post' => $post])
            </div>
        </div>
    </div>
</div>
