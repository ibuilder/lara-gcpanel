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

<form action="{{ isset($vendor) ? route('vendors.update', $vendor) : route('vendors.store') }}" method="POST">
    @csrf
    @if(isset($vendor))
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-6">
            <fieldset>
                <legend>Vendor Information</legend>
                <div class="form-group">
                    <label for="vendor_name">Vendor Name</label>
                    @input(['name' => 'vendor_name', 'value' => isset($vendor) ? $vendor->vendor_name : null, 'required' => true])
                </div>
                <div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    @input(['name' => 'contact_name', 'value' => isset($vendor) ? $vendor->contact_name : null])
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    @input(['name' => 'phone', 'value' => isset($vendor) ? $vendor->phone : null])
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    @input(['name' => 'email', 'value' => isset($vendor) ? $vendor->email : null])
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset>
                <legend>Address Information</legend>
                <div class="form-group">
                    <label for="address">Address</label>
                    @input(['name' => 'address', 'value' => isset($vendor) ? $vendor->address : null])
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    @input(['name' => 'city', 'value' => isset($vendor) ? $vendor->city : null])
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    @input(['name' => 'state', 'value' => isset($vendor) ? $vendor->state : null])
                </div>
                <div class="form-group">
                    <label for="zip">Zip</label>
                    @input(['name' => 'zip', 'value' => isset($vendor) ? $vendor->zip : null])
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>Additional Information</legend>
          <div class="form-group">
            <label for="notes">Notes</label>
            @textarea(['name' => 'notes', 'value' => isset($vendor) ? $vendor->notes : null])
          </div>
        </fieldset>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>