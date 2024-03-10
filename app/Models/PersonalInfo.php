<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PersonalInfo extends Model
{
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personal_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['firstName', 'lastName', 'phone', 'location', 'email', 'date_of_birth', 'image', 'bio',
        'linkedin', 'github', 'twitter', 'cv'
    ];

    /**
     * The attributes that are translated.
     *
     * @var array
     */
    protected array $translatable = [
        'location', 'bio'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
