<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@nbd-clan.com')
            ->view('emails.account-creation')
            ->with([
                'link' => $this->createToken()
            ]);
    }

    const TOKEN_LENGTH = 20;

    private function createToken()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $index = rand(0, strlen($characters) - 1);

        $token = '123456789abc';
        // TODO: Generate token here
        return $token;
    }
}
