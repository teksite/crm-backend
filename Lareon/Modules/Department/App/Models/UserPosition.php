<?php

namespace Lareon\Modules\Department\App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPosition extends Model
{
    protected $fillable = ['user_id', 'department_id', 'team_id', 'position',];
}
