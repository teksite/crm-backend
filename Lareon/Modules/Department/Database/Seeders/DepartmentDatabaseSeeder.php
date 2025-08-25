<?php

namespace Lareon\Modules\Department\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Lareon\CMS\App\Models\User;
use Teksite\Authorize\Models\Permission;
use Teksite\Authorize\Models\Role;

class DepartmentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            DepartmentsSeeder::class
        ]);


        $departmentManger = Permission::query()->where('title', 'LIKE', 'admin.department%')->pluck('id')->toArray();
        $teamManger = Permission::query()
            ->where('title', 'LIKE', 'admin.team%')
            ->orWhere('title', 'LIKE', 'admin.agent%')
            ->pluck('id')->toArray();
        $agentManger = Permission::query()
            ->where('title', 'LIKE', 'admin.agent%')
            ->pluck('id')->toArray();

        Role::query()->where('title' ,'department_manager')->get()
            ->each(fn($role) => $role->permissions()->syncWithoutDetaching($departmentManger));

        Role::query()->where('title' ,'team_manager')->get()
            ->each(fn($role) => $role->permissions()->syncWithoutDetaching($teamManger));

        Role::query()->where('title' ,'agent_manager')->get()
            ->each(fn($role) => $role->permissions()->syncWithoutDetaching($agentManger));


    }
}
