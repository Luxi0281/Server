<?php

namespace App\Repositories;

use App\Models\AddressTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AddressTranslationRepository
 * @package App\Repositories
 * @version May 7, 2018, 4:11 pm UTC
 *
 * @method AddressTranslation findWithoutFail($id, $columns = ['*'])
 * @method AddressTranslation find($id, $columns = ['*'])
 * @method AddressTranslation first($columns = ['*'])
*/
class AddressTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'address_id',
        'language_id',
        'full_address'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AddressTranslation::class;
    }
}
