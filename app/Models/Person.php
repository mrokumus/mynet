<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    /**
     * Define table for this model
     *
     * @var string
     */
    protected $table = 'persons';

    /**
     * Define fillable columns for Person model's table
     *
     * @var string
     */
    protected $fillable = [
        'name',
        'birthday',
        'gender'
    ];

    /**
     * Get addresses for the person. (One to many relation)
     *
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'person_id', 'id');
    }
}
