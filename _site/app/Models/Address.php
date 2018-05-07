<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Address
 * @package App\Models
 * @version May 7, 2018, 4:09 pm UTC
 *
 * @property string zip_code
 * @property integer city_id
 */
class Address extends Model
{
    public $table = 'addresses';

    public $fillable = [
        'zip_code',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'zip_code' => 'string',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'zip_code' => 'required',
        'city_id' => 'required'
    ];

    
}
