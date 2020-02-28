<?php

//User Model


namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservation(){
      return $this->hasMany('App\Reservation');
    }
    public function restaurants(){
      return $this->hasMany('App\Restaurant');
    }
    public function reviews(){
      return $this->hasMany('App\Review');
    }

    public function roles()
    {
      return $this->BelongsToMany('App\Role','user_role');
    }

    public function authorizeRoles($roles)
    {
      if (is_array($roles)){
        return $this->hasAnyRole($roles) || abort(401,'this action is unauthorized');
      }

      return $this->hasRole($roles) || abort(401,'this action is unauthorized');
    }

    public function hasRole($role)
    {
      return null != $this->roles()->where('name',$role)->first();
    }

    public function hasAnyRole($roles)
    {
      return null != $this->roles()->whereIn('name',$roles)->first();
    }
}
