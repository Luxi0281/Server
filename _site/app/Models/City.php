<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class City
 * @package App\Models
 * @version May 7, 2018, 4:05 pm UTC
 *
 * @property integer province_id
 */
class City extends Model
{
    public $table = 'cities';


    public $fillable = [
        'province_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'province_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'province_id' => 'required'
    ];

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function cityTranslations(){
        return $this->hasMany(CityTranslation::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
