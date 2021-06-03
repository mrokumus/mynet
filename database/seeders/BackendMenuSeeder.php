<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackendMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('backend_menus')->insert([
            [
                'id' => 1,
                'title' => 'Dashboard',
                'slug' => '',
                'icon' => 'fas fa-tachometer-alt',
                'has_sub_menu' => 0,
                'sub_menu_id' => null,
                'sub_menu_level' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Persons',
                'slug' => 'persons',
                'icon' => 'fas fa-user-friends',
                'has_sub_menu' => 1,
                'sub_menu_level' => 1,
                'sub_menu_id' => null,
            ],
            [
                'id' => 3,
                'title' => 'All Persons',
                'slug' => 'persons/all',
                'icon' => '',
                'has_sub_menu' => 0,
                'sub_menu_level' => 2,
                'sub_menu_id' => 2,
            ],
            [
                'id' => 4,
                'title' => 'Add Person',
                'slug' => 'persons/add',
                'icon' => 'fas fa-user-plus',
                'has_sub_menu' => 0,
                'sub_menu_level' => 2,
                'sub_menu_id' => 2,
            ],
            [
                'id' => 5,
                'title' => 'Addresses',
                'slug' => 'addresses',
                'icon' => 'fas fa-map-marked',
                'has_sub_menu' => 1,
                'sub_menu_level' => 1,
                'sub_menu_id' => null,
            ],
            [
                'id' => 6,
                'title' => 'All Addresses',
                'slug' => 'addresses/all',
                'icon' => '',
                'has_sub_menu' => 0,
                'sub_menu_level' => 2,
                'sub_menu_id' => 5,
            ],
            [
                'id' => 7,
                'title' => 'Add Addresses',
                'slug' => 'addresses/add',
                'icon' => '',
                'has_sub_menu' => 0,
                'sub_menu_level' => 2,
                'sub_menu_id' => 5,
            ],

        ]);
    }
}
