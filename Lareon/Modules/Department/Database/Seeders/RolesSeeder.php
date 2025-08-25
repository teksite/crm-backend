<?php

namespace Lareon\Modules\Department\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Teksite\Authorize\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Role::query()->insert([
           [
               'title' => 'department_manager',
               'hierarchy' => 20,
               'description' => 'Head of a department (sales, marketing, support, etc). Can manage teams in their department',
           ],
           [
               'title' => 'team_manager',
               'hierarchy' => 20,
               'description' => 'Manager of a specific team. Can manage teams of the specific department',
           ],

           [
               'title' => 'agent_manager',
               'hierarchy' => 20,
               'description' => 'Manager of a specific agents. Can manage agents of the specific team',
           ],


       ]);
    }
}
