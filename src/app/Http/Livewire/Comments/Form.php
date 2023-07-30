<?php

namespace App\Http\Livewire\Comments;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class Form extends Component
{
    public String $body;
    public Comment $comment;
    public Post $post;

    protected $rules = [
        'body' => 'required',
    ];

    /**
     * @param Post $post
     * @param Comment|null $comment
     * @return void
     */
    public function mount(Post $post, Comment $comment = null): void
    {
        $this->post = $post;

        $this->comment = $comment ?? new Comment();
        $this->body = $this->comment->body ?? '';
    }

    /**
     * @return void
     */
    public function save(): void
    {
        if(!Auth::user()->hasVerifiedEmail()){
            // Notify the user that they need to verify their email before creating a comment
            $this->dispatchBrowserEvent('alert', ['type'=>'error','message' => 'You need to verify your email before you can comment.']);
        }else {
            $this->validate();

            $this->comment->user_id = auth()->id();
            $this->comment->post_id = $this->post->id;
            $this->comment->body = $this->body;
            $this->comment->save();

            $this->comment = new Comment();
            $this->body = '';

            $this->emit('commentAdded');
        }
    }


    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.comments.form');
    }
}
