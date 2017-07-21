<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $normaluser = Role::updateOrCreate(
            ['title' => 'Normal User'],
            ['slug'  => 'normalUser']
        );
        $normaluser->permissions()->sync([7, 8, 9]);

        $administrator = Role::updateOrCreate(
            ['title' => 'Administrator'],
            ['slug'  => 'administrator']
        );
        $administrator->permissions()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,12,13]);

        $staff = Role::updateOrCreate(
            ['title' => 'Staff'],
            ['slug'  => 'staff']
        );
        $staff->permissions()->sync([6, 7, 8, 9, 10, 11]);

        $moderator = Role::updateOrCreate(
            ['title' => 'Moderator'],
            ['slug'  => 'moderator']
        );
        $moderator->permissions()->sync([6, 7, 8, 9, 10, 11]);
    }
}