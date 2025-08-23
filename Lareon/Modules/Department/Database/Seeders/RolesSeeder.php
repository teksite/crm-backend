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
               'description' => 'Manager of a specific team. Can manage users in their team',
           ],
           [
               'title' => 'sales_agent',
               'hierarchy' => 30,
               'description' => 'Salesperson in a team. Limited access only to their own leads, opportunities, and tasks',
           ],
           [
               'title' => 'marketing_agent',
               'hierarchy' => 30,
               'description' => 'Marketing specialist in a team. Limited access to campaigns and activities',
           ],
           [
               'title' => 'support_agent',
               'hierarchy' => 30,
               'description' => 'Support staff who handle tickets and customer issues',
           ],
           [
               'title' => 'finance_staff',
               'hierarchy' => 30,
               'description' => 'Finance/accounting staff, access to invoices and payments',
           ],

       ]);
    }
}
