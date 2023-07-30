<?php

namespace App\Http\Livewire\Comments;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Post;

class Index extends Component
{
    public Post $post;

    protected $listeners = ['commentAdded'];

    /**
     * @param Post $post
     * @return void
     */
    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    /**
     * @param $commentId
     * @return void
     */
    public function deleteComment($commentId): void
    {
        $comment = $this->post->comments()->find($commentId);

        if ($comment && ($comment->user_id == auth()->id() || auth()->user()->role == 'admin') && auth()->user()->hasVerifiedEmail()) {
            $comment->delete();

            $this->emit('commentDeleted');
        }else{
            $this->dispatchBrowserEvent('alert', ['type'=>'error','message' => "Unable to delete comment"]);
        }
    }

    /**
     * @return void
     */
    public function commentAdded(): void
    {
        // This will refresh the component when a comment is added
    }

    /**
     * @return void
     */
    public function commentDeleted(): void
    {
        // This will refresh the component when a comment is deleted
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.comments.index', [
            'comments' => $this->post->comments()->with('author')->latest()->get(),
        ]);
    }
}
