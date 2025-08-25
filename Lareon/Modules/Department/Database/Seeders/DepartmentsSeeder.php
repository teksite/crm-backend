<?php

namespace Lareon\Modules\Department\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Lareon\CMS\App\Models\User;
use Lareon\Modules\Department\App\Models\Department;
use Lareon\Modules\Department\App\Models\DepartmentAgent;
use Lareon\Modules\Department\App\Models\Team;
use Lareon\Modules\Department\App\Models\UserPosition;
use Teksite\Authorize\Models\Role;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        // ایجاد 55 کاربر با Eloquent
        for ($i=1; $i<66; $i++){
            $users[] = User::create([
                'parent_id' => null,
                'name' => "user $i",
                'lastname' => "lastname $i",
                'email' => "user$i@teksite.net",
                'phone' => "091260372$i",
                'telegram_id' => null,
                'featured_image' => null,
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'password' => Hash::make('password'),
            ]);
        }

        $userIndex = 0;

        for ($d = 1; $d <= 3; $d++) {
            $department = Department::create([
                'title' => "Department $d"
            ]);

            // مدیر دپارتمان
            $headUser = $users[$userIndex++];
            UserPosition::create([
                'user_id' => $headUser->id,
                'department_id' => $department->id,
                'team_id' => null,
                'position' => 'head'
            ]);

            // ایجاد 4 تیم برای دپارتمان
            for ($t = 1; $t <= 4; $t++) {
                $team = Team::create([
                    'department_id' => $department->id,
                    'title' => "Team $t of Department $d"
                ]);

                // مدیر تیم
                $managerUser = $users[$userIndex++];
                UserPosition::create([
                    'user_id' => $managerUser->id,
                    'department_id' => $department->id,
                    'team_id' => $team->id,
                    'position' => 'manager'
                ]);

                // 4 عضو برای هر تیم
                for ($m = 1; $m <= 4; $m++) {
                    $memberUser = $users[$userIndex++];
                    UserPosition::create([
                        'user_id' => $memberUser->id,
                        'department_id' => $department->id,
                        'team_id' => $team->id,
                        'position' => 'agent'
                    ]);
                }
            }
        }
    }
}
