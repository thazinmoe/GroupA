<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'post-list',
           'post-create',
           'post-edit',
           'post-delete',          
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'travelPackage-list',
           'travelPackage-create',
           'travelPackage-edit',
           'travelPackage-delete',
           'car-list',
           'car-create',
           'car-edit',
           'car-delete',
           'gallery-list',
           'gallery-create',
           'gallery-edit',
           'gallery-delete',
           'dashboard-list',         
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}