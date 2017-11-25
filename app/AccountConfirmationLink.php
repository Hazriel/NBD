<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AccountConfirmationLink extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'email',
        'token'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function validateAccount() {
        $user = $this->user();
        $user->activateAccount();
    }
}
