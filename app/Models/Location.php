<?php

namespace App\Models;

use Eloquent as Model;
/**
 * Class Location
 * @package App\Models
 * @version May 7, 2018, 4:12 pm UTC
 *
 * @property decimal latitude
 * @property decimal longitude
 * @property integer address_id
 */
class Location extends Model
{
    public $table = 'locations';

    public $fillable = [
        'latitude',
        'longitude',
        'address_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'address_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'latitude' => 'required',
        'longitude' => 'required',
        'address_id' => 'required'
    ];

    public function fund(){
        return $this->belongsTo(Fund::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }
}
