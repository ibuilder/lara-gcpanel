@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form fields for creating/editing a Lien Waiver --}}
@php
    // Determine if we are creating or editing a record
    $isEditMode = isset($lienWaiver);
    $formAction = $isEditMode ? route('lien_waivers.update', $lienWaiver) : route('lien_waivers.store');
    $formMethod = $isEditMode ? 'PUT' : 'POST';
@endphp

{{-- Form Open --}}
@open(['route' => $formAction, 'method' => $formMethod])
    @csrf

    <fieldset>
        <legend>Lien Waiver Details</legend>

        {{-- Waiver Number --}}
        @input([
            'name' => 'waiver_number',
            'label' => 'Waiver Number',
            'value' => old('waiver_number', $lienWaiver->waiver_number ?? ''),
            'required' => true,
        ])

        {{-- Project --}}
        @select([
            'name' => 'project_id',
            'label' => 'Project',
            'options' => \App\Models\ProjectInfo::pluck('name', 'id'),
            'selected' => old('project_id', $lienWaiver->project_id ?? ''),
            'required' => true,
        ])

        {{-- Vendor --}}
        @input([
            'name' => 'vendor',
            'label' => 'Vendor',
            'value' => old('vendor', $lienWaiver->vendor ?? ''),
            'required' => true,
        ])

        {{-- Contract --}}
        @select([
            'name' => 'contract_id',
            'label' => 'Contract',
            'options' => \App\Models\Contract::pluck('contract_number', 'id'),
            'selected' => old('contract_id', $lienWaiver->contract_id ?? ''),
            'required' => true,
        ])

        {{-- Waiver Amount --}}
        @input([
            'type' => 'number',
            'name' => 'waiver_amount',
            'label' => 'Waiver Amount',
            'value' => old('waiver_amount', $lienWaiver->waiver_amount ?? ''),
            'required' => true,
        ])

        {{-- Through Date --}}
        @input([
            'type' => 'date',
            'name' => 'through_date',
            'label' => 'Through Date',
            'value' => old('through_date', $lienWaiver->through_date ?? ''),
            'required' => true,
        ])

        {{-- Type --}}
        @select([
            'name' => 'type',
            'label' => 'Type',
            'options' => ['Partial' => 'Partial', 'Final' => 'Final'],
            'selected' => old('type', $lienWaiver->type ?? ''),
            'required' => true,
        ])

        {{-- Status --}}
        @select([
            'name' => 'status',
            'label' => 'Status',
            'options' => ['Draft' => 'Draft', 'Submitted' => 'Submitted', 'Approved' => 'Approved'],
            'selected' => old('status', $lienWaiver->status ?? ''),
            'required' => true,
        ])

        {{-- Notary --}}
        @input(['name' => 'notary', 'label' => 'Notary', 'value' => old('notary', $lienWaiver->notary ?? '')])

        {{-- Date Notarized --}}
        @input([
            'type' => 'date',
            'name' => 'date_notarized',
            'label' => 'Date Notarized',
            'value' => old('date_notarized', $lienWaiver->date_notarized ?? '')
        ])

        {{-- Notes --}}
        @input(['name' => 'notes', 'label' => 'Notes', 'value' => old('notes', $lienWaiver->notes ?? '')])
    </fieldset>

    {{-- Submit Button --}}
    <button type="submit" class="btn btn-primary">Submit</button>
{{-- Form Close --}}
@close()