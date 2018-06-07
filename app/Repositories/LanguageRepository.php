<?php

namespace App\Repositories;

use App\Models\Language;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LanguageRepository
 * @package App\Repositories
 * @version May 7, 2018, 3:57 pm UTC
 *
 * @method Language findWithoutFail($id, $columns = ['*'])
 * @method Language find($id, $columns = ['*'])
 * @method Language first($columns = ['*'])
*/
class LanguageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'language_code',
        'language_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Language::class;
    }
}
