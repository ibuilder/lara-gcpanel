@php
    $method = isset($coi) ? 'PUT' : 'POST';
    $action = isset($coi) ? route('cois.update', $coi->id) : route('cois.store');
@endphp

@open(['method' => $method, 'action' => $action, 'files' => true])
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <fieldset>
        <legend>COI Information</legend>

        @input(['name' => 'coi_number', 'label' => 'COI Number', 'value' => old('coi_number', $coi->coi_number ?? '')])
        @select(['name' => 'project_id', 'label' => 'Project', 'options' => \App\Models\ProjectInfo::all()->pluck('name', 'id'), 'value' => old('project_id', $coi->project_id ?? '')])
        @select(['name' => 'vendor_id', 'label' => 'Vendor', 'options' => \App\Models\Vendor::all()->pluck('name', 'id'), 'value' => old('vendor_id', $coi->vendor_id ?? '')])
        @input(['name' => 'insurer', 'label' => 'Insurer', 'value' => old('insurer', $coi->insurer ?? '')])
        @input(['name' => 'policy_number', 'label' => 'Policy Number', 'value' => old('policy_number', $coi->policy_number ?? '')])
        @input(['name' => 'effective_date', 'label' => 'Effective Date', 'type' => 'date', 'value' => old('effective_date', $coi->effective_date ?? '')])
        @input(['name' => 'expiration_date', 'label' => 'Expiration Date', 'type' => 'date', 'value' => old('expiration_date', $coi->expiration_date ?? '')])
        @input(['name' => 'coverage_type', 'label' => 'Coverage Type', 'value' => old('coverage_type', $coi->coverage_type ?? '')])
        @input(['name' => 'coverage_amount', 'label' => 'Coverage Amount', 'value' => old('coverage_amount', $coi->coverage_amount ?? '')])
    </fieldset>

    <fieldset>
        <legend>Attachments & Notes</legend>
        <div class="mb-3">
            <label for="coi_file" class="form-label">COI File</label>
            <input type="file" class="form-control" id="coi_file" name="coi_file">
            @error('coi_file')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes">{{ old('notes', $coi->notes ?? '') }}</textarea>
            @error('notes')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>

@close