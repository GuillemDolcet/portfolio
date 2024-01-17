<?php

namespace App\Models;

use App\Concerns\MemoizesAttributes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable;
    use Authorizable;
    use HasApiTokens;
    use HasFactory;
    use MemoizesAttributes;
    use Notifiable;
    use HasRoles;
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'phone',
        'location',
        'active',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * The attributes that are translated.
     *
     * @var array
     */
    protected array $translatable = [
        'location'
    ];

    ///// Relations //////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Skills relation.
     *
     * @return HasMany
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'user_id', 'id');
    }

    /**
     * Projects relation.
     *
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }

    /**
     * Education relation.
     *
     * @return HasMany
     */
    public function education(): HasMany
    {
        return $this->hasMany(Education::class, 'user_id', 'id');
    }

    /**
     * Experiences relation.
     *
     * @return HasMany
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'user_id', 'id');
    }

    /**
     * Hobbies relation.
     *
     * @return HasMany
     */
    public function hobbies(): HasMany
    {
        return $this->hasMany(Hobby::class, 'user_id', 'id');
    }

    /**
     * Languages relation.
     *
     * @return HasMany
     */
    public function languages(): HasMany
    {
        return $this->hasMany(UserLanguage::class, 'user_id', 'id');
    }

    ///// Functions //////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Return whether this user instance is active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return !!$this->getAttribute('active');
    }

}
