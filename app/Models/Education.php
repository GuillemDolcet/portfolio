<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

class Education extends Model
{
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'education';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school', 'degree', 'discipline', 'description', 'start_date', 'finish_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'finish_date' => 'date'
    ];

    /**
     * The attributes that are translated.
     *
     * @var array
     */
    protected array $translatable = [
        'school', 'degree', 'discipline', 'description'
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
