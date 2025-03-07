<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Advisor
 * @package App\Models
 * @version March 7, 2025, 4:37 pm -05
 *
 * @property string $localization
 * @property integer $id_employee
 */
class Advisor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'advisors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'localization',
        'id_employee'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'localization' => 'string',
        'id_employee' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'localization' => 'required',
        'id_employee' => 'required'
    ];

    
}
