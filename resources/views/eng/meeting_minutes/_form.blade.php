blade
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@open(['route' => isset($meetingMinute) ? ['meeting_minutes.update', $meetingMinute->id] : 'meeting_minutes.store', 'method' => isset($meetingMinute) ? 'PUT' : 'POST'])
    @csrf

    <button type="submit" class="btn btn-primary">Submit</button>
@close