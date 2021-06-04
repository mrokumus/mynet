<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    /**
     * Define table name for model
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * Define fillable columns for Address model's table
     *
     * @var string
     */
    protected $fillable = [
        'address',
        'post_code',
        'city_name',
        'country_name',
        'person_id',
    ];

}
