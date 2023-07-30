<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-xl sm:rounded-lg">
                <x-section-title title="Edit Post" description="" />
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="mb-3">
                        <x-label for="title">{{__("Title")}}</x-label>
                        <x-input class="w-full" type="text" wire:model="post.title"/>
                        <x-input-error for="post.title"/>
                    </div>
                    <div class="mb-3">
                        <x-label for="body">{{__("Body")}}</x-label>
                        <x-input  wire:model="post.body" class="w-full"/>
                        <x-input-error for="post.body"/>
                    </div>
                    <div class="flex justify-end items-end">
                        <x-nav-link href="{{ route('posts.index') }}">{{__('Back')}}</x-nav-link>
                        <x-button class="ml-4" type="submit">{{ __('Save') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
