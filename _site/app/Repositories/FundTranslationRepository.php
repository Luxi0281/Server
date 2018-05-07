<?php

namespace App\Repositories;

use App\Models\FundTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FundTranslationRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:17 pm UTC
 *
 * @method FundTranslation findWithoutFail($id, $columns = ['*'])
 * @method FundTranslation find($id, $columns = ['*'])
 * @method FundTranslation first($columns = ['*'])
*/
class FundTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fund_id',
        'language_id',
        'title',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FundTranslation::class;
    }
}
