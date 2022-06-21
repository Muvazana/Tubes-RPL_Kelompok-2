<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinStok extends Model
{
    use HasFactory;
    protected $table = 'vaksin_stoks';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vaksin_location_id',
        'data_vaksin_id',
        'stok',
    ];

    public function vaksin_locations()
    {
        return $this->belongsTo(VaksinLocation::class, 'vaksin_location_id', 'id');
    }

    public function data_vaksins()
    {
        return $this->belongsTo(DataVaksin::class, 'data_vaksin_id', 'id');
    }
}