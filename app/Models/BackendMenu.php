<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackendMenu extends Model
{
    use HasFactory;

    /**
     * Define table for this model
     *
     * @var string
     */
    protected $table = 'backend_menus';

    /**
     * Define fillable columns for BackendMenu model's table
     *
     * @var string
     */
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'has_sub_menu',
        'sub_menu_id',
    ];
}
