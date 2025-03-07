<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MonthlyData
 * @package App\Models
 * @version March 7, 2025, 5:02 pm -05
 *
 * @property integer $year
 * @property integer $month
 * @property integer $amounth
 * @property integer $id_advisor
 */
class MonthlyData extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'monthly_datas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'month',
        'amounth',
        'id_advisor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'year' => 'integer',
        'month' => 'integer',
        'amounth' => 'integer',
        'id_advisor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required',
        'month' => 'required',
        'amounth' => 'required',
        'id_advisor' => 'required'
    ];

    
}
