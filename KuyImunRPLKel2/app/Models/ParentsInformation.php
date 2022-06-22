<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentsInformation extends Model
{
    use HasFactory;
    protected $table = 'parents_information';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nik',
        'name',
        'parent_type',
    ];

    public function user_members()
    {
        return $this->belongsTo(UserMember::class, 'user_id', 'user_id');
    }
}
