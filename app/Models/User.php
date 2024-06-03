<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;



    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'id_roles',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function hasPermission($actionName){
        
        $permissions = config("role.permissions")[$this->id_roles];
        if (is_null($permissions)) {
            return true;
        }
        $permissions = array_merge(config("role.none_authorize_actions"), $permissions);
     
        if (in_array($actionName, $permissions)) {
            return true;
        }
        $actionArray = explode('.', $actionName);
       
        $key = $actionArray[0];
        $actionAllItem = count($actionArray) > 1 ? $key . ".*" : null;
        return in_array($actionAllItem, $permissions);
    }
}