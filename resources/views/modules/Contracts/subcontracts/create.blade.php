php
--- a/resources/views/modules/Contracts/subcontracts/create.blade.php
+++ b/resources/views/modules/Contracts/subcontracts/create.blade.php


@section('content')
    <div class="container">
        <h1>Create Subcontract</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('subcontracts.store') }}">
            @csrf

            <div class="form-group">
                <label for="subcontract_number">Subcontract Number</label>
                <input type="text" class="form-control" id="subcontract_number" name="subcontract_number" value="{{ old('subcontract_number') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="prime_contract_id">Prime Contract</label>
                <select class="form-control" id="prime_contract_id" name="prime_contract_id">
                    @foreach($primeContracts as $primeContract)
                        <option value="{{ $primeContract->id }}" {{ old('prime_contract_id') == $primeContract->id ? 'selected' : '' }}>{{ $primeContract->contract_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="vendor_id">Vendor</label>
                <select class="form-control" id="vendor_id" name="vendor_id">
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}" {{ old('vendor_id') == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Submitted" {{ old('status') == 'Submitted' ? 'selected' : '' }}>Submitted</option>
                    <option value="Approved" {{ old('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('subcontracts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection