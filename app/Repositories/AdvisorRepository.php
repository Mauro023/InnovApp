<?php

namespace App\Repositories;

use App\Models\Advisor;
use App\Repositories\BaseRepository;

/**
 * Class AdvisorRepository
 * @package App\Repositories
 * @version March 7, 2025, 4:37 pm -05
*/

class AdvisorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'localization',
        'id_employee'
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
        return Advisor::class;
    }
}
