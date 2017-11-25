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
        // Build a confirmation link
        $token = $this->createToken();

        return $this->from('no-reply@nbd-clan.com')
            ->markdown('emails.account-creation')
            ->with([
                'link' => 'replace-by-token'
            ]);
    }

    const TOKEN_LENGTH = 20;

    private function createToken()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $token = '';

        for ($i = 0; $i < self::TOKEN_LENGTH; ++$i) {
            $index = rand(0, strlen($characters) - 1);
            $token .= $characters[$index];
        }

        return $token;
    }
}
