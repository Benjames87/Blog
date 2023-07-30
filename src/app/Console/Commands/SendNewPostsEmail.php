<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPostsMail;
use App\Models\Post;
use Carbon\Carbon;

class SendNewPostsEmail extends Command
{
    protected $signature = 'email:new-posts';

    protected $description = 'Send an email with new posts';

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $posts = Post::where('created_at', '>=', Carbon::now()->subDay())->get();
        $users = User::all();
        if(count($posts) > 0) {
            foreach($users as $user) {
                Mail::to($user->email)->send(new NewPostsMail($posts));
            }
        }
    }
}
