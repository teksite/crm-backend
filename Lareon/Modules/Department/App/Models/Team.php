<?php

namespace Lareon\Modules\Department\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lareon\CMS\App\Models\User;

class Team extends Model
{
    protected $table='department_teams';
    protected $fillable=['head_id','title'];

    /**
     * @return string[]
     */
    static function rules(): array
    {
        return [
            'head_id'=>['nullable'],
            'title'=>'nullable|unique:department_teams,title|max:150',
        ];
    }

    /**
     * @return BelongsTo|null
     */
    public function department(): ? BelongsTo
    {
        return $this->belongsTo(Department::class ,'department_id');
    }

    /**
     * @return BelongsTo|null
     */
    public function manager(): ? BelongsTo
    {
        return $this->belongsTo(User::class ,'manager_id');
    }



}
