<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gcPanel Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.partials.header')
    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')

    <main class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Example of a module card -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="font-semibold">Qualified Bidders</h2>
                <p>Manage qualified bidders for your projects.</p>
                <a href="{{ route('qualified-bidders.index') }}" class="text-blue-500">View Module</a>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="font-semibold">Bid Packages</h2>
                <p>Manage bid packages for your projects.</p>
                <a href="{{ route('bid-packages.index') }}" class="text-blue-500">View Module</a>
            </div>
            <!-- Add more module cards as needed -->
        </div>
    </main>

    @include('layouts.partials.footer')
</body>
</html>