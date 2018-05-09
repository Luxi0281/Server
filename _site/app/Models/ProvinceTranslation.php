<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ProvinceTranslation
 * @package App\Models
 * @version May 7, 2018, 4:04 pm UTC
 *
 * @property integer province_id
 * @property integer language_id
 * @property string province_name
 */
class ProvinceTranslation extends Model
{
    public $table = 'province_translations';

    public $fillable = [
        'province_id',
        'language_id',
        'province_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'province_id' => 'integer',
        'language_id' => 'integer',
        'province_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'province_id' => 'required',
        'language_id' => 'required',
        'province_name' => 'required'
    ];

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
}
