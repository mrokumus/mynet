<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackendMenu extends Model
{
    use HasFactory;

    protected $table = 'backend_menus';
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'has_sub_menu',
        'sub_menu_id',
    ];
}
