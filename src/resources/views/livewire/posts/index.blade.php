<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-xl sm:rounded-lg">
                <x-section-title title="Blog Posts" description="A list of posts within the blog" />
                <div class="flex justify-between items-stretch mt-3 mb-5">
                    <div>
                        <x-input type="text" wire:model="search" placeholder="Search posts..." />
                    </div>
                    <div>
                        <x-nav-link class="bg-blue-800 hover:bg-blue-500 text-white hover:text-white leading-none pt-2 pb-2 px-3 rounded" href="{{ route('posts.create') }}">
                            {{ __('Add Post') }}
                        </x-nav-link>
                    </div>
                </div>
                @foreach($posts as $post)
                    <div class="flex mb-3 w-full border rounded p-4">
                        <div style="width:calc(100% - 300px)">{{ $post->title }}</div>
                        <div class="actions text-right" style="width:300px">
                            <x-nav-link class="leading-none bg-blue-800 hover:bg-blue-500 border text-white hover:text-white rounded pt-2 pb-2 px-3" href="{{ route('posts.show',['post' => $post->id]) }}">
                                {{ __('View') }}
                            </x-nav-link>
                            @if( Auth::user()->hasRole('admin') OR Auth::user()->id ==$post->user_id)
                                <x-nav-link class="leading-none bg-gray-800 hover:bg-gray-700 border text-white hover:text-white rounded pt-2 pb-2 px-3" href="{{ route('posts.edit',['post' => $post->id]) }}">
                                    {{ __('Edit') }}
                                </x-nav-link>
                                @if( Auth::user()->hasRole('admin'))
                                    <x-nav-link wire:click="deletePost({{ $post->id }})" class="hover:cursor-pointer leading-none bg-red-700 hover:bg-red-500 border text-white hover:text-white rounded pt-2 pb-2 px-3">
                                        {{ __('Delete') }}
                                    </x-nav-link>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
