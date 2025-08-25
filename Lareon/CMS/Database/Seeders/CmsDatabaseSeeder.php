<?php

namespace Lareon\CMS\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Lareon\CMS\App\Models\User;
use Teksite\Authorize\Models\Permission;
use Teksite\Authorize\Models\Role;
use Teksite\Lareon\Facade\Lareon;
use Teksite\Module\Facade\Module;

class CmsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulesPermissionSeederClass=[];
        $modulesPRoleSeederClass=[];
        foreach (Lareon::getModules() as $module){
            $fullClassPermissionName = "Lareon\\Modules\\{$module}\\Database\\Seeders\\PermissionsSeeder";
            $mainPermissionSeederPath = Module::modulePath($module, "Database/Seeders/PermissionsSeeder.php");

            $fullClassRoleName = "Lareon\\Modules\\{$module}\\Database\\Seeders\\RolesSeeder";
            $mainRoleSeederPath = Module::modulePath($module, "Database/Seeders/RolesSeeder.php");
            if (file_exists($mainPermissionSeederPath) && class_exists($fullClassPermissionName)) {
                $modulesPermissionSeederClass[]=$fullClassPermissionName;
            }

            if (file_exists($mainRoleSeederPath) && class_exists($fullClassRoleName)) {
                $modulesPRoleSeederClass[]=$fullClassRoleName;
            }
        }

        $this->call([
            PermissionsSeeder::class,
            ...$modulesPermissionSeederClass,
            ...$modulesPRoleSeederClass,
            RolesSeeder::class,
            UsersSeeder::class,
        ]);

        $adminPermissions = Permission::query()->pluck('id')->toArray();

        $clientPermissions = Permission::query()->where('title', 'LIKE', 'client%')->orWhere('title', 'LIKE', 'panel%')->pluck('id')->toArray();

        Role::whereIn('title', ['owner', 'admin', 'administrator'])
            ->each(fn($role) => $role->permissions()->syncWithoutDetaching($adminPermissions));

        Role::where('title', 'user')
            ->each(fn($role) => $role->permissions()->syncWithoutDetaching($clientPermissions));

        if ($user = User::find(1)) $user->assignRole('administrator');



    }
}
