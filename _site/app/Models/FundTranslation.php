<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FundTranslation
 * @package App\Models
 * @version May 7, 2018, 4:17 pm UTC
 *
 * @property integer fund_id
 * @property integer language_id
 * @property string title
 * @property string description
 */
class FundTranslation extends Model
{
    public $table = 'fund_translations';


    public $fillable = [
        'fund_id',
        'language_id',
        'title',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fund_id' => 'integer',
        'language_id' => 'integer',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fund_id' => 'required',
        'language_id' => 'required',
        'title' => 'required',
        'description' => 'required'
    ];

    
}
