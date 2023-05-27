<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([Permission::all()]);

        $role = Role::create(['name' => 'particular']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'professional']);
        $role->givePermissionTo(Permission::all());

        $user1 = new User;
        $user1->name = 'Admin';
        $user1->username = 'admin';
        $user1->email = 'admin@gmail.com';
        $user1->password = Hash::make('admin123');
        $user1->email_verified_at = now();
        $user1->save();
        $user1->assignRole('admin');

        $user2 = new User;
        $user2->name = 'particular';
        $user2->username = 'particular';
        $user2->email = 'particular@gmail.com';
        $user2->password = Hash::make('test123');
        $user2->email_verified_at = now();
        $user2->save();
        $user2->assignRole('particular');

        $user3 = new User;
        $user3->name = 'professional';
        $user3->username = 'professional';
        $user3->email = 'professional@gmail.com';
        $user3->password = Hash::make('test123');
        $user3->email_verified_at = now();
        $user3->save();
        $user3->assignRole('professional');
    }
}
