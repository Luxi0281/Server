<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Province
 * @package App\Models
 * @version May 7, 2018, 4:02 pm UTC
 *
 * @property char province_code
 * @property integer country_id
 */
class Province extends Model
{
    public $table = 'provinces';

    public $fillable = [
        'province_code',
        'country_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'province_code' => 'string',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'province_code' => 'required',
        'country_id' => 'required'
    ];

    public function provinceTranslations(){
        return $this->hasMany(ProvinceTranslation::class);
    }

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
