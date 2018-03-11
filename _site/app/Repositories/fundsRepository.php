<?php

namespace App\Repositories;

use App\Models\funds;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class fundsRepository
 * @package App\Repositories
 * @version December 18, 2017, 4:16 pm UTC
 *
 * @method funds findWithoutFail($id, $columns = ['*'])
 * @method funds find($id, $columns = ['*'])
 * @method funds first($columns = ['*'])
*/
class fundsRepository extends BaseRepository
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
        return funds::class;
    }
}
