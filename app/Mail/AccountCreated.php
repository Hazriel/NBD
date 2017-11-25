<?php

namespace App\Mail;

use App\AccountConfirmationLink;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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

        $unusedToken = false;
        while ($unusedToken) {
            // Make sure the token is not already taken
            $link = AccountConfirmationLink::where('token', $token)->first();
            if ($link == null)
                $unusedToken = true;
            else
                $token = $this->createToken();
        }

        $link = route('confirm-account');
        $link .= '?' . config('app.VALIDATE_ACCOUNT_TOKEN_FIELD_NAME') . '=' . $token;

        // Create a entry in the links table
        AccountConfirmationLink::create([
            'user_id' => $this->user->id,
            'token' => $token
        ]);

        return $this->from('no-reply@nbd-clan.com')
            ->markdown('emails.account-creation')
            ->with([
                'link' => $link
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
