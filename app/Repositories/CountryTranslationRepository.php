<?php

namespace App\Repositories;

use App\Models\CountryTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CountryTranslationRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:00 pm UTC
 *
 * @method CountryTranslation findWithoutFail($id, $columns = ['*'])
 * @method CountryTranslation find($id, $columns = ['*'])
 * @method CountryTranslation first($columns = ['*'])
*/
class CountryTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'language_id',
        'country_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CountryTranslation::class;
    }
}
