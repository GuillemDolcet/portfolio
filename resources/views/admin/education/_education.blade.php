<tr>
    <td>{{ ucfirst($educationModel->school) }}</td>
    <td>{{ ucfirst($educationModel->degree) }}</td>
    <td>{{ ucfirst($educationModel->discipline) }}</td>
    <td>{{ $educationModel->start_date->format('d/m/y') }}</td>
    <td>{{ $educationModel->finish_date->format('d/m/y') }}</td>
    <td>
        <div class="d-flex flex-wrap gap-1">
            @foreach($educationModel->skills as $skill)
                <div><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" width="40" height="40"/></div>
            @endforeach
        </div>
    </td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            @can('edit', $educationModel)
                <a href="#" class="me-1" title="@lang('admin.education')"
                   data-controller="remote-modal"
                   data-action="remote-modal#toggle"
                   data-remote-modal-url-value="{{ route('admin.education.edit', $educationModel) }}"
                   data-remote-modal-target-value="#education-form-modal">
                    @can('update', $educationModel)
                        <x-icon icon="edit"/>
                    @else
                        <x-icon icon="view"/>
                    @endcan
                </a>
            @else
                <span class="text-muted"><x-icon icon="view"/></span>
            @endcan
            @can('delete', $educationModel)
                <form method="post" action="{{ route('admin.education.destroy', $educationModel) }}"
                      data-controller="form"
                      data-confirm="@lang('admin.confirms.delete-education')">
                    @csrf
                    @method('delete')
                    <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                        <x-icon icon="trash"/>
                    </a>
                </form>
            @else
                <span class="text-muted"><x-icon icon="trash"/></span>
            @endcan
        </div>
    </td>
</tr>
