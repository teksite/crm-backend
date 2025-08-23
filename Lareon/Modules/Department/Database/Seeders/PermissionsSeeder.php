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
           ['title' => 'admin.team.read', 'description' => 'View teams'],
           ['title' => 'admin.team.create', 'description' => 'Create teams'],
           ['title' => 'admin.team.edit', 'description' => 'Edit teams'],
           ['title' => 'admin.team.delete', 'description' => 'Delete teams'],

           /*contact*/
           ['title' => 'admin.contact.read', 'description' => 'View contacts'],
           ['title' => 'admin.contact.create', 'description' => 'Create contacts'],
           ['title' => 'admin.contact.edit', 'description' => 'Edit contacts'],
           ['title' => 'admin.contact.delete', 'description' => 'Delete contacts'],

           /*lead*/
           ['title' => 'admin.lead.read', 'description' => 'View leads'],
           ['title' => 'admin.lead.create', 'description' => 'Create leads'],
           ['title' => 'admin.lead.edit', 'description' => 'Edit leads'],
           ['title' => 'admin.lead.delete', 'description' => 'Delete leads'],

           /*opportunity*/
           ['title' => 'admin.opportunity.read', 'description' => 'View opportunities'],
           ['title' => 'admin.opportunity.create', 'description' => 'Create opportunities'],
           ['title' => 'admin.opportunity.edit', 'description' => 'Edit opportunities'],
           ['title' => 'admin.opportunity.delete', 'description' => 'Delete opportunities'],

           /* Panel */
           /*department*/
           ['title' => 'panel.department.read', 'description' => 'View departments'],
           ['title' => 'panel.department.create', 'description' => 'Create departments'],
           ['title' => 'panel.department.edit', 'description' => 'Edit departments'],
           ['title' => 'panel.department.delete', 'description' => 'Delete departments'],

           /*team*/
           ['title' => 'panel.team.read', 'description' => 'View teams'],
           ['title' => 'panel.team.create', 'description' => 'Create teams'],
           ['title' => 'panel.team.edit', 'description' => 'Edit teams'],
           ['title' => 'panel.team.delete', 'description' => 'Delete teams'],

           /*contact*/
           ['title' => 'panel.contact.read', 'description' => 'View contacts'],
           ['title' => 'panel.contact.create', 'description' => 'Create contacts'],
           ['title' => 'panel.contact.edit', 'description' => 'Edit contacts'],
           ['title' => 'panel.contact.delete', 'description' => 'Delete contacts'],

           /*lead*/
           ['title' => 'panel.lead.read', 'description' => 'View leads'],
           ['title' => 'panel.lead.create', 'description' => 'Create leads'],
           ['title' => 'panel.lead.edit', 'description' => 'Edit leads'],
           ['title' => 'panel.lead.delete', 'description' => 'Delete leads'],

           /*opportunity*/
           ['title' => 'panel.opportunity.read', 'description' => 'View opportunities'],
           ['title' => 'panel.opportunity.create', 'description' => 'Create opportunities'],
           ['title' => 'panel.opportunity.edit', 'description' => 'Edit opportunities'],
           ['title' => 'panel.opportunity.delete', 'description' => 'Delete opportunities'],
       ]);
    }
}
