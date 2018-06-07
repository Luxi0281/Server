<?php

namespace App\Repositories;

use App\Models\ProvinceTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProvinceTranslationRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:04 pm UTC
 *
 * @method ProvinceTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProvinceTranslation find($id, $columns = ['*'])
 * @method ProvinceTranslation first($columns = ['*'])
*/
class ProvinceTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'province_id',
        'language_id',
        'province_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProvinceTranslation::class;
    }
}
