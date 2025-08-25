<?php

namespace Lareon\Modules\Department\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Teksite\Authorize\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Permission::query()->insert([
           /* ADMIN */
           /*department*/
           ['title' => 'admin.department.read', 'description' => 'View departments'],
           ['title' => 'admin.department.create', 'description' => 'Create departments'],
           ['title' => 'admin.department.edit', 'description' => 'Edit departments'],
           ['title' => 'admin.department.delete', 'description' => 'Delete departments'],

           /*team*/
           ['title' => 'admin.department.team.read', 'description' => 'View teams'],
           ['title' => 'admin.department.team.create', 'description' => 'Create teams'],
           ['title' => 'admin.department.team.edit', 'description' => 'Edit teams'],
           ['title' => 'admin.department.team.delete', 'description' => 'Delete teams'],

           /*agent*/
           ['title' => 'admin.department.agent.read', 'description' => 'View agents of the team'],
           ['title' => 'admin.department.agent.create', 'description' => 'Create agents of the team'],
           ['title' => 'admin.department.agent.edit', 'description' => 'Edit agents of the team'],
           ['title' => 'admin.department.agent.delete', 'description' => 'Delete agents of the team'],

       ]);
    }
}
