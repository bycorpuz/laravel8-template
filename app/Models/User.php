<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'google_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personalInformation(){
        return $this->hasOne('App\Models\PersonalInformation');
    }

    public function familyBackground(){
        return $this->hasOne('App\Models\FamilyBackground');
    }

    public function otherInformationQuestion(){
        return $this->hasOne('App\Models\OtherInformationQuestion');
    }

    public function hrei(){
        if ($this->hasOne('App\Models\HrEmploymentInformation')){
            return $this->hasOne('App\Models\HrEmploymentInformation');
        } else {
            return 'N/A';
        }
    }
}
