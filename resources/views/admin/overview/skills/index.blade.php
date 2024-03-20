<div class="accordion row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div>
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-skill" aria-expanded="true" aria-controls="collapse-skill">
                    <span class="page-title">@lang('admin.skills')</span>
                </button>
            </div>
                @can('create', \App\Models\Skill::class)
                <div class="me-3">
                    <a href="#"
                       data-controller="remote-modal"
                       data-action="remote-modal#toggle"
                       data-remote-modal-url-value="{{ route('admin.skills.create') }}"
                       data-remote-modal-target-value="#skill-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                </div>
                @endcan
        </div>
        <div id="collapse-skill" class="accordion-collapse collapse show">
            @each('admin.overview.skills._skill', $skills, 'skill', 'admin.overview.skills._empty')
        </div>
    </div>
</div>

