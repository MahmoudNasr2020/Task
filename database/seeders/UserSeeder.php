<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    public function run()
    {
       /* $user = User::updateOrCreate([
            'name' => 'Super User',
            'user_name' => 'super_user',
            'password' => bcrypt('123456')
        ]);

        $role = Role::updateOrCreate(['name'=>'super_user']);
        $permissions = Permission::get()->pluck('id');
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);*/

    }
}
