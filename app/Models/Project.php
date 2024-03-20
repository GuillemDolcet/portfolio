<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'description', 'url', 'image', 'order'
    ];

    /**
     * The attributes that are translated.
     *
     * @var array
     */
    protected array $translatable = [
        'name', 'description'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    ///// Relations //////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Skills relation.
     *
     * @return MorphToMany
     */
    public function skills(): MorphToMany
    {
        return $this->morphToMany(Skill::class, 'skillable');
    }

    ///// Scopes //////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Scope by language name.
     *
     * @param Builder $query
     * @param User $user
     * @return void
     */
    public function scopeUser(Builder $query, User $user): void
    {
        $query->where('user_id', '=', $user->getKey());
    }
}
