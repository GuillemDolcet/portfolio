<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Language extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'image'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    ///// Scopes //////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Scope by language name.
     *
     */
    public function scopeName(Builder $query, string $name): void
    {
        $query->where('name', '=', $name);
    }

    /**
     * Scope by not language name.
     *
     */
    public function scopeNotName(Builder $query, string $name): void
    {
        $query->where('name', '!=', $name);
    }

    /**
     * Order by locale language.
     *
     */
    public function scopeOrderByLocale(Builder $query): void
    {
        $lang = app()->getLocale();
        $query->orderby(DB::raw("case when name = '$lang' then 2 end"));
    }
}
