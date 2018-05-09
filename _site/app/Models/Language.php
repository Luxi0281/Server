<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Language
 * @package App\Models
 * @version May 7, 2018, 3:57 pm UTC
 *
 * @property char language_code
 * @property string language_name
 */
class Language extends Model
{
    public $table = 'languages';
    

    public $fillable = [
        'language_code',
        'language_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'language_code' => 'string',
        'language_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'language_code' => 'required',
        'language_name' => 'required'
    ];

    public function fundTranslation(){
        return $this->hasOne(FundTranslation::class);
    }

    public function countyTranslation(){
        return $this->hasOne(CountryTranslation::class);
    }

    public function provinceTranslation(){
        return $this->hasOne(ProvinceTranslation::class);
    }

    public function cityTranslation(){
        return $this->hasOne(CityTranslation::class);
    }

    public function addressTranslation(){
        return $this->hasOne(AddressTranslation::class);
    }
}
