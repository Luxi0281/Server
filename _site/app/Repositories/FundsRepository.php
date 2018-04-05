<?php

namespace App\Repositories;

use App\Models\Fund;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class fundsRepository
 * @package App\Repositories
 * @version December 18, 2017, 4:16 pm UTC
 *
 * @method Fund findWithoutFail($id, $columns = ['*'])
 * @method Fund find($id, $columns = ['*'])
 * @method Fund first($columns = ['*'])
*/
class FundsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'logo',
        'picture',
        'link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Fund::class;
    }
}
