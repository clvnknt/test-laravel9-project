<?php

namespace App\Mail;

use App\Models\Friend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewFriendRecord extends Mailable
{
    use Queueable, SerializesModels;

    public $friend;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Friend $friend)
    {
        $this->friend = $friend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@ccs06.com', 'CCS06 Mailer Service')
                ->view('emails.new-friend-record')
                ->with([
                    'friend_name' => $this->friend->getCompleteName(),
                    'friend_email' => $this->friend->getEmail(),
                    'friend_contact_number' => $this->friend->getContactNumber()
                ]);
    }
}
