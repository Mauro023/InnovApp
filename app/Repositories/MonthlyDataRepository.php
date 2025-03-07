<?php

namespace App\Repositories;

use App\Models\MonthlyData;
use App\Repositories\BaseRepository;

/**
 * Class MonthlyDataRepository
 * @package App\Repositories
 * @version March 7, 2025, 5:02 pm -05
*/

class MonthlyDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'month',
        'amounth',
        'id_advisor'
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
        return MonthlyData::class;
    }
}
