<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'image', 'level', 'order'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    ///// Relations //////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * User relation.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Experiences relation.
     *
     * @return BelongsToMany
     */
    public function experiences(): BelongsToMany
    {
        return $this->belongsToMany(Experience::class, 'experience_skills', 'skill_id', 'experience_id');
    }

    ///// Scopes //////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Scope by language name.
     */
    public function scopeUser(Builder $query, User $user): void
    {
        $query->where('user_id', '=', $user->getKey());
    }

    /**
     * Scope by name.
     */
    public function scopeName(Builder $query, string $name): void
    {
        $query->where('name', '=', $name);
    }
}
