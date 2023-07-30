<div>
    @foreach($comments as $comment)
        <div class="border-t mt-2 flex items-stretch py-2">
            <div class="p-2 text-center" style="width:200px;">
                <p><strong>{{ $comment->author->name }}</strong></p>
                <p class="leading-none"><small>{{ $comment->created_at }}</small></p>
            </div>
            <div class="p-2 border-l" style="min-width:calc(100% - 300px)">
                <p>{{ $comment->body }}</p>
            </div>
            @if( Auth::user()->hasRole('admin') OR Auth::user()->id == $comment->user_id)
                <div class="actions text-right" style="min-width:100px">
                    <x-nav-link wire:click="deleteComment({{ $comment->id }})" class="hover:cursor-pointer leading-none bg-red-700 hover:bg-red-500 border text-white hover:text-white rounded pt-2 pb-2 px-3" >
                        {{ __('Delete') }}
                    </x-nav-link>
                </div>
            @endif
        </div>
    @endforeach
</div>
