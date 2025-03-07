<?php

namespace App\Repositories;

use App\Models\Work_position;
use App\Repositories\BaseRepository;

/**
 * Class Work_positionRepository
 * @package App\Repositories
 * @version February 13, 2025, 11:33 am -05
*/

class Work_positionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'state'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Work_position::class;
    }
}
