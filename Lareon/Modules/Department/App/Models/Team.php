<?php

namespace Lareon\Modules\Department\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Lareon\CMS\App\Models\User;

class Team extends Model
{
    protected $table='department_teams';
    protected $fillable = ['department_id', 'description', 'title'];

    /**
     * @return string[]
     */
    public static function rules(): array
    {
        return [
            'title' => 'required|unique:department_teams,title|max:150',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function positions(): HasMany
    {
        return $this->hasMany(UserPosition::class, 'team_id');
    }

    public function manager(): HasOne
    {
        return $this->hasOne(UserPosition::class, 'team_id')->where('position', 'manager');
    }

    public function agents(): BelongsToMany
    {
        return $this->hasMany(UserPosition::class)->whereNotIn('position', ['manager' ,'head']);

    }


}
