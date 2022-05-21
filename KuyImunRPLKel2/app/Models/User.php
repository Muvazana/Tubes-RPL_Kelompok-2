<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function hasRole($role)
    {
        if($this->role == $role)
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }

    // public function isAdmin()
    // {
    //     if($this->role == 'super_admin' || $this->role == 'admin')
    //     { 
    //         return true; 
    //     } 
    //     else 
    //     { 
    //         return false; 
    //     }
    // }

    public function user_super_admins()
    {
        return $this->hasOne(UserSuperAdmin::class, 'user_id', 'id');
    }

    public function user_admins()
    {
        return $this->hasOne(UserAdmin::class, 'user_id', 'id');
    }

    public function user_members()
    {
        return $this->hasOne(UserMember::class, 'user_id', 'id');
    }
}
