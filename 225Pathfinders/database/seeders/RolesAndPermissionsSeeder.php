<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role; 

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Créer des permissions
       Permission::create(['name' => 'edit articles']);
       Permission::create(['name' => 'delete articles']);
       // Ajouter d'autres permissions si nécessaire

       // Créer des rôles et attribuer des permissions
       $adminRole = Role::create(['name' => 'admin']);
       $adminRole->givePermissionTo('edit articles');
       $adminRole->givePermissionTo('delete articles');

       $userRole = Role::create(['name' => 'user']);
       $userRole->givePermissionTo('edit articles');

    }
}
