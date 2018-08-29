<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','user_role','user_id', 'role_id');
    }

    public function viewer(){
        return $this->hasOne('App\Models\Viewer','email','email');
    }

    public function manager(){
        return $this->hasOne('App\Models\Manager','email','email');
    }

    public function admin(){
        return $this->hasOne('App\Models\Admin','email','email');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            $role = $user->roles->first();
            $user->roles()->sync([]);
            if($role->name === 'ADMIN')
                $user->admin->delete();
            else  if($role->name === 'MANAGER')
                $user->manager->delete();
            else  if($role->name === 'VIEWER')
                $user->viewer->delete();
             // do the rest of the cleanup...
        });
    }
}
