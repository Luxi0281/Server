<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CityTranslation
 * @package App\Models
 * @version May 7, 2018, 4:07 pm UTC
 *
 * @property integer city_id
 * @property integer language_id
 * @property string city_name
 */
class CityTranslation extends Model
{
    public $table = 'city_translations';

    public $fillable = [
        'city_id',
        'language_id',
        'city_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'city_id' => 'integer',
        'language_id' => 'integer',
        'city_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'city_id' => 'required',
        'language_id' => 'required',
        'city_name' => 'required'
    ];

    
}
