<?php

namespace App\Repositories;

use App\Models\Cost_center;
use App\Repositories\BaseRepository;

/**
 * Class Cost_centerRepository
 * @package App\Repositories
 * @version February 13, 2025, 5:42 pm -05
*/

class Cost_centerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'state',
        'quarter_id'
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
        return Cost_center::class;
    }
}
