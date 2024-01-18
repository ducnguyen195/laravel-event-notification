<?php

namespace App\Listeners;

use App\Events\ViewPostEvent;
use App\Http\Controllers\User\PostController;
use App\Models\Post;
use App\Models\User;
use App\Notifications\ViewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class PostViewListener implements ShouldQueue
{
    use InteractsWithQueue;
//    /**
//     * Create the event listener.
//     */
//    public $post;
//    public $view;
//    public function __construct($view,$post)
//    {
//        $this->post = $post;
//        $this->view = $view;
//    }

    /**
     * Handle the event.
     */
    public function handle(ViewPostEvent $event): void
    {
//        echo '<pre>';
//        print_r($event);
//        echo '<pre>';
//        exit;
        // lấy ra id tác giả bài viết
        $postAu = $event->post->author;
        // kiểm tra xem có phải tác giả bài viết k -> nếu k phải gửi thông báo bài viết dc xem ...
        if (Auth::id() !== $event->post->user_id){
            // gửi thông báo cho tác giả
            $postAu ->notify(new ViewPost($event->post,$event->viewer));
        }
        $event->post->increment('num_view');
    }

}
