<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @group Data Vaksin Model
 *
 * This model contain all data model for Vaksin
 */
class DataVaksin extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'data_vaksins';
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    /**
     * have a relation with Model VaksinStok
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function vaksin_stoks()
    {
        return $this->hasOne(VaksinStok::class, 'data_vaksin_id', 'id');
    }

    /**
     * have a relation with Model VaksinStok
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function vaksin_logs()
    {
        return $this->hasMany(VaksinLog::class, 'data_vaksin_id', 'id');
    }
}
