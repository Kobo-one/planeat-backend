<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superAdmin = Role::findOrCreate('Super Admin');
        $admin = Role::findOrCreate('Admin');
        $recipeCreator = Role::findOrCreate('Recipe Creator');
        $family = Role::findOrCreate('Family');
        $parent = Role::findOrCreate('Parent');
        $child = Role::findOrCreate('Child');
        $permissions[] = Permission::findOrCreate('edit recipes');
        $permissions[] = Permission::findOrCreate('create recipes');
        $recipeCreator->syncPermissions($permissions);
        $permissions[] = Permission::findOrCreate('delete recipes');
        $admin->syncPermissions($permissions);

    }
}
