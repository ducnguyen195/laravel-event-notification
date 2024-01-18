<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ViewPost extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $post;
    public $viewer;
    public function __construct($post,$viewer)
    {
        $this -> viewer = $viewer;
        $this -> post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'post_id' => $this->post->id,
            'post_name' =>$this->post->name,
            'viewer_name' => Auth::user()->name,
        ];
    }

}
