blade
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4>@isset($company) Edit Company @else Create Company @endisset</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($company) ? route('companies.update', $company) : route('companies.store') }}" method="POST">
                @csrf
                @isset($company)
                    @method('PUT')
                @endisset

                <fieldset>
                    <legend>Company Information</legend>
                    <div class="mb-3">
                        @input(['name' => 'company_name', 'label' => 'Company Name', 'value' => isset($company) ? $company->company_name : null, 'required' => true])
                    </div>
                    <div class="mb-3">
                        @input(['name' => 'address', 'label' => 'Address', 'value' => isset($company) ? $company->address : null])
                    </div>
                    <div class="mb-3">
                        @input(['name' => 'city', 'label' => 'City', 'value' => isset($company) ? $company->city : null])
                    </div>
                    <div class="mb-3">
                        @input(['name' => 'state', 'label' => 'State', 'value' => isset($company) ? $company->state : null])
                    </div>
                    <div class="mb-3">
                        @input(['name' => 'zip', 'label' => 'Zip', 'value' => isset($company) ? $company->zip : null])
                    </div>
                    <div class="mb-3">
                        @input(['name' => 'phone_number', 'label' => 'Phone Number', 'value' => isset($company) ? $company->phone_number : null])
                    </div>
                    <div class="mb-3">
                        @input(['name' => 'website', 'label' => 'Website', 'value' => isset($company) ? $company->website : null])
                    </div>
                </fieldset>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>