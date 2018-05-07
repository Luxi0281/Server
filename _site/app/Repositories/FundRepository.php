<?php

namespace App\Repositories;

use App\Models\Fund;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FundRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:29 pm UTC
 *
 * @method Fund findWithoutFail($id, $columns = ['*'])
 * @method Fund find($id, $columns = ['*'])
 * @method Fund first($columns = ['*'])
*/
class FundRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'picture',
        'link',
        'email',
        'phone',
        'location_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Fund::class;
    }
}
