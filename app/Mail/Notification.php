<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $article
     * @param array $comment
     * @param $typeOfNotification
     */
    public function __construct($article, $comment, $typeOfNotification)
    {
        $this->article = $article;
        $this->comment = $comment;
        $this->typeOfNotification = $typeOfNotification;
        $this->user = auth()->user();
    }

    public $article;
    public $comment;
    public $typeOfNotification;
    public $user;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   if($this->typeOfNotification === "comment")
            return $this->from('notification@lesbonsdeals.ch')->view('emails.comment');
        elseif ($this->typeOfNotification === "contact")
            return $this->from('notification@lesbonsdeals.ch')->view('emails.contact');
    }
}
