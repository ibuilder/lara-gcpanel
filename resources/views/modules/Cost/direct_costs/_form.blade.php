php
@open(['route' => isset($directCost) ? ['direct_costs.update', $directCost->id] : 'direct_costs.store', 'method' => isset($directCost) ? 'PUT' : 'POST'])
@csrf
<div class="container">
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
        <legend>Direct Cost Details</legend>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cost_code_id">Cost Code</label>
                    @select([
                    'name' => 'cost_code_id',
                    'id' => 'cost_code_id',
                    'options' => $costCodes->pluck('code_description', 'id'),
                    'selected' => isset($directCost) ? $directCost->cost_code_id : old('cost_code_id'),
                    'placeholder' => 'Select Cost Code'
                    ])
                    @error('cost_code_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_id">Project</label>
                     @select([
                        'name' => 'project_id',
                        'id' => 'project_id',
                        'options' => \App\Models\ProjectInfo::pluck('name', 'id')->toArray(),
                        'selected' => isset($directCost) ? $directCost->project_id : old('project_id'),
                        'placeholder' => 'Select Project'
                    ])
                    @error('project_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vendor">Vendor</label>
                    @input(['name' => 'vendor', 'id' => 'vendor', 'value' => isset($directCost) ? $directCost->vendor : old('vendor')])
                    @error('vendor')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="invoice_number">Invoice Number</label>
                    @input(['name' => 'invoice_number', 'id' => 'invoice_number', 'value' => isset($directCost) ? $directCost->invoice_number : old('invoice_number')])
                    @error('invoice_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    @input(['name' => 'description', 'id' => 'description', 'value' => isset($directCost) ? $directCost->description : old('description')])
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="date">Date</label>
                    @input(['type' => 'date','name' => 'date','id' => 'date','value' => isset($directCost) ? $directCost->date : old('date')])
                     @error('date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        @input(['type' => 'number', 'name' => 'amount', 'id' => 'amount', 'value' => isset($directCost) ? $directCost->amount : old('amount')])
                        @error('amount')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" class="form-control">{{ isset($directCost) ? $directCost->notes : old('notes') }}</textarea>
                         @error('notes')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                         <label for="attachments">Attachments</label>
                         @input(['type' => 'file','name' => 'attachments', 'id' => 'attachments',])
                          @error('attachments')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                    </div>
                </div>
            </div>
        

    </fieldset>
   <button type="submit" class="btn btn-primary">Save</button>
</div>
@close