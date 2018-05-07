<?php

namespace App\Repositories;

use App\Models\CityTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CityTranslationRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:07 pm UTC
 *
 * @method CityTranslation findWithoutFail($id, $columns = ['*'])
 * @method CityTranslation find($id, $columns = ['*'])
 * @method CityTranslation first($columns = ['*'])
*/
class CityTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'city_id',
        'language_id',
        'city_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CityTranslation::class;
    }
}
