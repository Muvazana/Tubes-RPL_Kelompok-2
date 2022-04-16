<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataVaksin extends Model
{
    use HasFactory;
    protected $table = 'data_vaksins';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    public function vaksin_stoks()
    {
        return $this->hasOne(VaksinStok::class, 'data_vaksin_id', 'id');
    }

    public function vaksin_logs()
    {
        return $this->hasMany(VaksinLog::class, 'data_vaksin_id', 'id');
    }
}
