<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Employee
 * @package App\Models
 * @version February 13, 2025, 10:37 pm -05
 *
 * @property string $dni
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $second_last_name
 * @property string $state
 * @property integer $workposition_id
 * @property integer $cost_center_id
 * @property integer $service_id
 */
class Employee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employees';
    
    public function user_employees()
    {
        return $this->hasMany(User_employee::class);
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'dni',
        'first_name',
        'middle_name',
        'last_name',
        'second_last_name',
        'state',
        'workposition_id',
        'cost_center_id',
        'service_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dni' => 'string',
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string',
        'second_last_name' => 'string',
        'state' => 'string',
        'workposition_id' => 'integer',
        'cost_center_id' => 'integer',
        'service_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dni' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'state' => 'required',
        'workposition_id' => 'required',
        'cost_center_id' => 'required',
        'service_id' => 'required'
    ];

    
}
