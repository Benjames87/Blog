<?php
namespace App\Http\Livewire\Posts;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Post;

class Show extends Component
{
    public Post $post;

    /**
     * @param Post $post
     * @return void
     */
    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.posts.show');
    }
}
