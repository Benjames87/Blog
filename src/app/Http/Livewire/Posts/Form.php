<?php

namespace App\Http\Livewire\Posts;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;
use Livewire\Redirector;

class Form extends Component
{
    public Post $post;
    public $updateMode = false;

    protected $rules = [
        'post.title' => 'required',
        'post.body' => 'required',
    ];


    /**
     * @return RedirectResponse|Redirector
     */
    public function save(): RedirectResponse|Redirector
    {
        $redirectPath = ($this->updateMode? '/posts/'.$this->post->id.'/edit' : '/');
        if(!Auth::user()->hasVerifiedEmail()){
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'You need to verify your email before creating a post.']);
        }else {
            $this->validate();

            $this->post->user_id = auth()->id();
            $this->post->save();

            $this->dispatchBrowserEvent('alert', ['message' => $this->updateMode ? 'Post updated successfully.' : 'Post created successfully.']);
        }
        return redirect()->to($redirectPath);
    }

    /**
     * @return void
     */
    private function resetInputFields(): void
    {
        $this->post = new Post;
        $this->updateMode = false;
    }

    /**
     * @param $post
     * @return void
     */
    public function mount($post = null): void
    {
        $this->post = $post ?? new Post;
        $this->updateMode = !!$post;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.posts.form');
    }
}
