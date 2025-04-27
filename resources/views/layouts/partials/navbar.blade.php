<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gcPanel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('dashboard') }}">gcPanel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('modules.index') }}">Modules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.index') }}">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings.index') }}">Settings</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="d-flex">
        <aside class="sidebar">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('preconstruction.index') }}">Preconstruction</a></li>
                <li class="list-group-item"><a href="{{ route('engineering.index') }}">Engineering</a></li>
                <li class="list-group-item"><a href="{{ route('field.index') }}">Field</a></li>
                <li class="list-group-item"><a href="{{ route('safety.index') }}">Safety</a></li>
                <li class="list-group-item"><a href="{{ route('contracts.index') }}">Contracts</a></li>
                <li class="list-group-item"><a href="{{ route('cost.index') }}">Cost</a></li>
                <li class="list-group-item"><a href="{{ route('bim.index') }}">BIM</a></li>
                <li class="list-group-item"><a href="{{ route('closeout.index') }}">Closeout</a></li>
                <li class="list-group-item"><a href="{{ route('resources.index') }}">Resources</a></li>
            </ul>
        </aside>

        <main class="content">
            @yield('content')
        </main>
    </div>

    <footer>
        <div class="text-center py-3">
            <p>&copy; {{ date('Y') }} gcPanel. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>