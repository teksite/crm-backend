<?php

namespace Lareon\Modules\Department\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Lareon\CMS\App\Models\User;

class Department extends Model
{
    protected $fillable = ['description', 'title'];

    /**
     * @return string[]
     */
    public static function rules(): array
    {
        return [
            'description' => 'nullable|string',
            'title' => 'required|unique:departments,title|max:150',
        ];
    }
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function positions(): HasMany
    {
        return $this->hasMany(UserPosition::class);
    }

    public function head(): HasOne
    {
        return $this->hasOne(UserPosition::class)->where('position', 'head');
    }

    public function managers(): HasMany
    {
        return $this->hasMany(UserPosition::class)->where('position', 'manager');
    }

    public function agents(): BelongsToMany
    {
        return $this->hasMany(UserPosition::class)->whereNotIn('position', ['manager' ,'head']);

    }
}
