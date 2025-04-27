<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- ... head content ... --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">
            {{-- ... header, sidebar, main content ... --}}
        </div>

        @stack('scripts') {{-- Add this line if not already present --}}
    </body>
</html>