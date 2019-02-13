<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'file.create']);
        Permission::create(['name'=>'file.store']);
        Permission::create(['name'=>'file.images']);
        Permission::create(['name'=>'file.videos']);
        Permission::create(['name'=>'file.documents']);
        Permission::create(['name'=>'file.audios']);


        $admin=Role::Create(['name'=>'Admin']);
        $subscriber=Role::Create(['name'=>'Suscriptor']);

        $admin->givePermissionTo(Permission::all());
        $subscriber->givePermissionTo([
            'file.create',
            'file.store',
            'file.images',
        ]);

        $user=User::find(1);//
        $user->assignRole('Admin');//

    }
}
