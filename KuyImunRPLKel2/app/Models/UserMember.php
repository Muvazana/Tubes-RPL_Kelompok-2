<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMember extends Model
{
    use HasFactory;
    protected $table = 'user_members';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nik',
        'child_name',
        'child_gender',
        'child_birth_date',
        'phone_number',
        'address',
        'optional_address',
        'zip_code',
        'city',
        'state',
        'latitude',
        'longitude',
        'document_path',
        'status',
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parents_information()
    {
        return $this->hasOne(ParentsInformation::class, 'user_id', 'user_id');
    }
    
    public function vaksin_logs()
    {
        return $this->hasMany(VaksinLog::class, 'user_id', 'user_id');
    }
}
