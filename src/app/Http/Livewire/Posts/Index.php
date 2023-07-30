<?php

namespace App\Http\Livewire\Posts;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Post;

class Index extends Component
{
    public $search = "";


    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.posts.index', [
            'posts' => Post::where('title', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ]);
    }

    /**
     * @param $postId
     * @return void
     */
    public function deletePost($postId): void
    {
        $post = Post::find($postId);

        if ($post && ($post->user_id == auth()->id() || auth()->user()->role == 'admin') && auth()->user()->hasVerifiedEmail()) {
            $post->delete();

            $this->emit('postDeleted');
        }else{
            $this->dispatchBrowserEvent('alert', ['type'=>'error','message' => "Unable to delete post"]);
        }
    }
    /**
     * @return void
     */
    public function postDeleted(): void
    {
        // This will refresh the component when a comment is deleted
    }
}
