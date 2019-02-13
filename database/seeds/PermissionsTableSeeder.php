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
        // PERMISOS PARA LOS ARCHIVOS
        // Permission::create(['name'=>'file.create','description'=>'Subir archivos']);
        // Permission::create(['name'=>'file.store','description'=>'Almacenar archivos']);
        // Permission::create(['name'=>'file.images','description'=>'Ver las imagenes']);
        // Permission::create(['name'=>'file.videos','description'=>'Ver los videos']);
        // Permission::create(['name'=>'file.documents','description'=>'Ver los documentos']);
        // Permission::create(['name'=>'file.audios','description'=>'Ver los audios']);

        // PERMISOS PARA LOS ROLES
        Permission::create(['name'=>'role.index','description'=>'Mostrar todos los roles']);
        Permission::create(['name'=>'role.create','description'=>'Crear un nuevo rol']);
        Permission::create(['name'=>'role.store','description'=>'Almacenar un nuevo rol']);
        Permission::create(['name'=>'role.edit','description'=>'Editar un rol']);
        Permission::create(['name'=>'role.update','description'=>'Actualizar un rol']);
        Permission::create(['name'=>'role.show','description'=>'Ver detalles de un rol']);
        Permission::create(['name'=>'role.destroy','description'=>'Eliminar un rol']);


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
