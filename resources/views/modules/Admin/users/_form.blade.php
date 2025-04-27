blade
<form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="POST">
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif

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
        <legend>User Information</legend>
        <div class="form-group">
            <label for="first_name">First Name</label>
            @input(['name' => 'first_name', 'id' => 'first_name', 'value' => isset($user) ? $user->first_name : null])
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            @input(['name' => 'last_name', 'id' => 'last_name', 'value' => isset($user) ? $user->last_name : null])
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            @input(['name' => 'email', 'id' => 'email', 'type' => 'email', 'value' => isset($user) ? $user->email : null])
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            @select(['name' => 'role', 'id' => 'role', 'options' => ['admin' => 'Admin', 'user' => 'User'], 'selected' => isset($user) ? $user->role : null])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            @input(['name' => 'password', 'id' => 'password', 'type' => 'password'])
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            @input(['name' => 'password_confirmation', 'id' => 'password_confirmation', 'type' => 'password'])
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Save</button>
</form>