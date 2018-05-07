<?php

namespace App\Repositories;

use App\Models\Province;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProvinceRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:02 pm UTC
 *
 * @method Province findWithoutFail($id, $columns = ['*'])
 * @method Province find($id, $columns = ['*'])
 * @method Province first($columns = ['*'])
*/
class ProvinceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'province_code',
        'country_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Province::class;
    }
}
