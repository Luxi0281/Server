<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AddressTranslation
 * @package App\Models
 * @version May 7, 2018, 4:11 pm UTC
 *
 * @property integer address_id
 * @property integer language_id
 * @property string full_address
 */
class AddressTranslation extends Model
{
    public $table = 'address_translations';


    public $fillable = [
        'address_id',
        'language_id',
        'full_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'address_id' => 'integer',
        'language_id' => 'integer',
        'full_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address_id' => 'required',
        'language_id' => 'required',
        'full_address' => 'required'
    ];


}
