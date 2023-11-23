<tr>
    <td>{{ ucfirst($experience->name) }}</td>
    <td>{{ ucfirst($experience->description) }}</td>
    <td>{{ $experience?->start_date->format('d/m/y H:i') ?? '-' }}</td>
    <td>{{ $experience?->finish_date->format('d/m/y H:i') ?? '-' }}</td>
    <td>{{ $experience?->currently ? 'Yes' : 'No' }}</td>
    <td>
        <div class="d-flex">
            @foreach($experience->skills as $skill)
                <div><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" width="40" height="40"/></div>
            @endforeach
        </div>
    </td>
</tr>
