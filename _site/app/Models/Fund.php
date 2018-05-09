<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Fund
 * @package App\Models
 * @version May 7, 2018, 4:29 pm UTC
 *
 * @property string picture
 * @property string link
 * @property string email
 * @property string phone
 * @property integer location_id
 */
class Fund extends Model
{
    public $table = 'funds';

    public $fillable = [
        'picture',
        'link',
        'email',
        'phone',
        'location_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'picture' => 'string',
        'link' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'location_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'picture' => 'required',
        'link' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'location_id' => 'required'
    ];

    public function location(){
        return $this->hasOne(Location::class);
    }

    public function fundTranslations(){
        return $this->hasMany(FundTranslation::class);
    }
}
