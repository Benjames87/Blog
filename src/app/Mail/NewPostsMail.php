<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;

class NewPostsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $posts;

    /**
     * @param $posts
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return NewPostsMail
     */
    public function build(): NewPostsMail
    {
        return $this->view('emails.new_posts')->with('posts', $this->posts);
    }
}
