<?php

namespace Lareon\CMS\App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Lareon\CMS\App\Cast\AvatarCast;
use Lareon\CMS\App\Traits\UserHasMeta;
use Lareon\CMS\Database\Factories\UserFactory;

use Lareon\Modules\Department\App\Models\Department;
use Lareon\Modules\Department\App\Models\Team;
use Lareon\Modules\Department\App\Models\UserPosition;
use Teksite\Authorize\Traits\HasAuthorization;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasAuthorization, UserHasMeta;

    protected static function newFactory(): UserFactory|Factory
    {
        return UserFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['parent_id', 'name', 'lastname', 'email', 'phone', 'telegram_id', 'featured_image', 'email_verified_at', 'phone_verified_at', 'password',];


    public function getTitleAttribute()
    {
        return "$this->name  $this->lastname ";
    }

    protected $appends = ['title'];
    /**
     * @return string[]
     */
    static function rules(): array
    {
        return [
            'parent_id' => 'nullable|int',
            'name' => 'required|string|max:255',
            'nick_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:11',
            'telegram_id' => 'nullable|string|max:255',
            'featured_image' => 'nullable|string|max:255',
            'password' => 'required|string|min:8',
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
        'telegram_id',
        'parent_id',
        'id'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
            'featured_image' => AvatarCast::class,
        ];
    }

    /**
     * @return bool
     */
    public function markPhoneAsVerified(): bool
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }


    public function parent(): ?BelongsTo
    {
        return $this->parent_id ? $this->belongsTo(self::class, 'parent_id') : null;
    }

    /*   */
    public function managedDepartments(): HasMany
    {
        return $this->hasMany(Department::class, 'head_id');
    }


    public function managedTeams(): HasMany
    {
        return $this->hasMany(Team::class, 'manager_id');
    }


    public function agents()
    {
        return $this->belongsToMany(Team::class, 'department_agents')
            ->withPivot(['position'])
            ->withTimestamps();
    }

    public function positions()
    {
        return $this->hasMany(UserPosition::class);
    }

    public function rolesPositions()
    {
        return $this->positions()->with(['department','team'])->get()->map(function($p){
            return [
                'position' => $p->position,
                'department' => $p->department?->title,
                'team' => $p->team?->title,
            ];
        });
    }

}
