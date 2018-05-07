<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CountryTranslation
 * @package App\Models
 * @version May 7, 2018, 4:00 pm UTC
 *
 * @property integer country_id
 * @property integer language_id
 * @property string country_name
 */
class CountryTranslation extends Model
{
    public $table = 'country_translations';

    public $fillable = [
        'country_id',
        'language_id',
        'country_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'country_id' => 'integer',
        'language_id' => 'integer',
        'country_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'language_id' => 'required',
        'country_name' => 'required'
    ];

    
}
