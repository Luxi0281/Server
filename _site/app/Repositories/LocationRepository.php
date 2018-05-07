<?php

namespace App\Repositories;

use App\Models\Location;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LocationRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:12 pm UTC
 *
 * @method Location findWithoutFail($id, $columns = ['*'])
 * @method Location find($id, $columns = ['*'])
 * @method Location first($columns = ['*'])
*/
class LocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'latitude',
        'longitude',
        'address_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Location::class;
    }
}
