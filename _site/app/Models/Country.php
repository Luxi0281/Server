<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Country
 * @package App\Models
 * @version May 7, 2018, 3:58 pm UTC
 *
 * @property char country_code
 */
class Country extends Model
{
    public $table = 'countries';

    public $fillable = [
        'country_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'country_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_code' => 'required'
    ];

    
}
