<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinLocation extends Model
{
    use HasFactory;
    protected $table = 'vaksin_locations';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'latitude',
        'longitude',
    ];

    public function user_admins()
    {
        return $this->hasMany(UserAdmin::class, 'vaksin_location_id', 'id');
    }
    
    public function vaksin_stoks()
    {
        return $this->hasMany(VaksinStok::class, 'vaksin_location_id', 'id');
    }
    
    public function vaksin_logs()
    {
        return $this->hasMany(VaksinLog::class, 'vaksin_location_id', 'id');
    }
}
