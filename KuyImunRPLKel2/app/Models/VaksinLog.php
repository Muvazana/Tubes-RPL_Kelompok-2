<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinLog extends Model
{
    use HasFactory;
    protected $table = 'vaksin_logs';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'vaksin_location_id',
        'data_vaksin_id',
        'status',
        'vaksination_date'
    ];

    public function user_members()
    {
        return $this->belongsTo(UserMember::class, 'user_id', 'user_id');
    }

    public function vaksin_locations()
    {
        return $this->belongsTo(VaksinLocation::class, 'vaksin_location_id', 'id');
    }

    public function data_vaksins()
    {
        return $this->belongsTo(DataVaksin::class, 'data_vaksin_id', 'id');
    }
}
