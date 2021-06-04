<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';
    protected $fillable = [
        'name',
        'birthday',
        'gender'
    ];

    /**
     * Get addresses for the person. (One to many relation)
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class,'person_id','id');
    }
}
