<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #region user
        Permission::updateOrCreate(
            ['slug'        => 'user.update'],
            ['description' => 'Update information about other users']
        );

        Permission::updateOrCreate(
            ['slug'        => 'user.add'],
            ['description' => 'Create new users']
        );

        Permission::updateOrCreate(
            ['slug'        => 'user.delete'],
            ['description' => 'Delete a specified user']
        );

        Permission::updateOrCreate(
            ['slug' => 'user.roles'],
            ['description' => 'Ability to create and assign roles to people.']
        );

        Permission::updateOrCreate(
            ['slug'        => 'user.ban'],
            ['description' => 'Ban or give penalties to a specified user']
        );
        #endregion

        #region forum
        Permission::updateOrCreate(
            ['slug'        => 'forum.topic'],
            ['description' => 'Ability to create new topics.']
        );

        Permission::updateOrCreate(
            ['slug'        => 'forum.post'],
            ['description' => 'Ability to create posts.']
        );

        Permission::updateOrCreate(
            ['slug' => 'forum.comment'],
            ['description' => 'Ability to comment on posts.']
        );

        Permission::updateOrCreate(
            ['slug' => 'forum.delete'],
            ['description' => 'Ability to delete forum related stuff.']
        );

        Permission::updateOrCreate(
            ['slug' => 'forum.manage'],
            ['description' => 'Ability to manage forum related stuff.']
        );
        #endregion

        #region news
        Permission::updateOrCreate(
            ['slug' => 'news.manage'],
            ['description' => 'Access to news admin panel.']
        );

        Permission::updateOrCreate(
            ['slug' => 'news.add'],
            ['description' => 'Ability to add new news.']
        );
        #endregion

        #region audit
        Permission::updateOrCreate(
            ['slug' => 'audit.manage'],
            ['description' => 'Access to audit panel.']
        );
        #endregion
    }
}
