<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Collective\Html\Eloquent\FormAccessible;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use FormAccessible;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'birth_date',
        'activated',
        'banned',
        'description',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Activate the account of the user.
     */
    public function activateAccount() {
        $this->update([
            'activated' => true
        ]);
    }

    public function toSearchableArray() {
        return array($this->username, $this->email);
    }

    public function formattedBirthDate() {
        if ($this->birth_date == null)
            return 'Not specified';
        return Carbon::parse($this->birth_date)->format('d/m/Y');
    }

}
