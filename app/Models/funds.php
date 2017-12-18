<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class funds
 * @package App\Models
 * @version December 18, 2017, 4:16 pm UTC
 *
 * @property string title
 * @property string description
 * @property string logo
 * @property string picture
 * @property string link
 */
class funds extends Model
{
    use SoftDeletes;

    public $table = 'funds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'logo',
        'picture',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'logo' => 'string',
        'picture' => 'string',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
