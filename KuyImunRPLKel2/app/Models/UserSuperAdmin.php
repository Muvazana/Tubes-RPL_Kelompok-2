<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSuperAdmin extends Model
{
    use HasFactory;
    protected $table = 'user_super_admins';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
