php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="cost_code">Cost Code</label>
            <select name="cost_code_id" id="cost_code_id" class="form-control">
                <option value="">Select Cost Code</option>
                @foreach($costCodes as $costCode)
                    <option value="{{ $costCode->id }}" @if(isset($directCost) && $directCost->cost_code_id == $costCode->id) selected @endif>{{ $costCode->code }} - {{ $costCode->description }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ isset($directCost) ? $directCost->date : old('date') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="vendor">Vendor</label>
            <input type="text" name="vendor" id="vendor" class="form-control" value="{{ isset($directCost) ? $directCost->vendor : old('vendor') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="invoice_number">Invoice Number</label>
            <input type="text" name="invoice_number" id="invoice_number" class="form-control" value="{{ isset($directCost) ? $directCost->invoice_number : old('invoice_number') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ isset($directCost) ? $directCost->description : old('description') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ isset($directCost) ? $directCost->amount : old('amount') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" class="form-control">{{ isset($directCost) ? $directCost->notes : old('notes') }}</textarea>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Save</button>