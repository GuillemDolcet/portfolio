<?php

namespace App\Providers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Faq;
use App\Models\PersonalInfo;
use App\Models\Project;
use App\Models\Section;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use App\Policies\EducationPolicy;
use App\Policies\ExperiencePolicy;
use App\Policies\FaqPolicy;
use App\Policies\PersonalInfoPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\SectionPolicy;
use App\Policies\ServicePolicy;
use App\Policies\SkillPolicy;
use App\Policies\TestimonialPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
        Education::class => EducationPolicy::class,
        Experience::class => ExperiencePolicy::class,
        Faq::class => FaqPolicy::class,
        PersonalInfo::class => PersonalInfoPolicy::class,
        Section::class => SectionPolicy::class,
        Service::class => ServicePolicy::class,
        Skill::class => SkillPolicy::class,
        Testimonial::class => TestimonialPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Set default ruleset for user passwords
        Password::defaults(function () {
            $rule = Password::min(8);

            return app()->isProduction()
                ? $rule->mixedCase()->numbers()->symbols()
                : $rule;
        });
    }
}
