<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cost_center
 * @package App\Models
 * @version February 13, 2025, 5:42 pm -05
 *
 * @property string $code
 * @property string $name
 * @property string $state
 * @property integer $quarter_id
 */
class Cost_center extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cost_centers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'name',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required'
    ];

    
}
