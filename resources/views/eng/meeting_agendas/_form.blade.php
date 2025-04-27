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

@open(['route' => isset($meetingAgenda) ? ['eng.meeting_agendas.update', $meetingAgenda->id] : 'eng.meeting_agendas.store', 'method' => isset($meetingAgenda) ? 'PUT' : 'POST'])
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
@close