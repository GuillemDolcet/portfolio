<tr>
    <td>{{ ucfirst($experience->position) }}</td>
    <td>{{ ucfirst($experience->company) }}</td>
    <td>{{ ucfirst($experience->location) }}</td>
    <td>{{ $experience->start_date->format('d/m/y') }}</td>
    <td>{{ !is_null($experience->finish_date) ? $experience->finish_date->format('d/m/y') : Lang::get('admin.currently') }}</td>
    <td>
        <div class="d-flex flex-wrap gap-1">
            @foreach($experience->skills as $skill)
                <div class="me-2"><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" height="40"/></div>
            @endforeach
        </div>
    </td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.experience')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.experiences.edit', $experience) }}"
               data-remote-modal-target-value="#experience-form-modal">
                <x-icon icon="edit"/>
            </a>
            <form method="post" action="{{ route('admin.experiences.destroy', $experience) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-experience')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit" >
                    <x-icon icon="trash"/>
                </a>
            </form>
        </div>
    </td>
</tr>
