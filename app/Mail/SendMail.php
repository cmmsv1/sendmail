<?php

namespace App\Mail;

use App\Models\Score;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    private $scores = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($scores)
    {
        $this->scores = $scores;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Điểm của bạn')->view('mail')->with('scores', $this->scores);
    }
}
