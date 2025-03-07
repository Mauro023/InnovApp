<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Work_position
 * @package App\Models
 * @version February 13, 2025, 11:33 am -05
 *
 * @property string $description
 * @property string $state
 */
class Work_position extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'work_positions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'description' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required'
    ];

    
}
