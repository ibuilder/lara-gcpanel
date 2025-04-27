php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all