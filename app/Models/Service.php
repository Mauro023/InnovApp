<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Service
 * @package App\Models
 * @version February 13, 2025, 10:22 pm -05
 *
 * @property string $description
 * @property string $state
 */
class Service extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'services';
    

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
        'description' => 'required',
        'state' => 'required'
    ];

    
}
