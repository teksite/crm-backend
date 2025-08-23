<?php

namespace Lareon\Modules\Department\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Lareon\CMS\App\Models\User;

class Department extends Model
{
    protected $fillable = ['department_id', 'manager_id', 'title'];

    /**
     * @return string[]
     */
    static function rules(): array
    {
        return [
            'head_id' => ['nullable'],
            'title' => 'nullable|unique:departments,title|max:150',
        ];
    }

    /**
     * @return BelongsTo|null
     */
    public function head(): ?BelongsTo
    {
        return $this->belongsTo(User::class, 'head_id');
    }

    /**
     * @return HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'department_id');
    }

    /**
     * @return HasMany
     */
    public function managers(): HasMany
    {
        return $this->hasManyThrough(User::class, 'department_id');
    }


    /**
     * @return HasMany
     */
    public function agents()
    {
        return $this->hasManyThrough(
            User::class,
            Team::class,
            'department_id',
            'team_id',
            'id',
            'id'
        );
    }
}
