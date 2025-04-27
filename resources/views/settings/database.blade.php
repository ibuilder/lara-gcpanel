<!-- filepath: resources/views/settings/database.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Database Settings & Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"> {{-- Added space-y-6 --}}
            <!-- Session Status -->
            @include('layouts.partials.session-messages')

            {{-- Connection Status Display --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Current Connection Status') }}
                    </h3>
                    <div id="connection-status" class="mt-2 p-3 rounded border {{ $connectionStatus['connected'] ? 'bg-green-100 dark:bg-green-900 border-green-400 dark:border-green-600 text-green-700 dark:text-green-200' : 'bg-red-100 dark:bg-red-900 border-red-400 dark:border-red-600 text-red-700 dark:text-red-200' }}">
                        {{ $connectionStatus['message'] }}
                    </div>
                    <div class="mt-4">
                         <x-secondary-button id="test-connection-btn">
                            {{ __('Test Connection Again') }}
                        </x-secondary-button>
                    </div>
                     <div id="test-result" class="mt-3 text-sm"></div> {{-- Area for AJAX result --}}
                </div>
            </div>

            {{-- Configuration Details Display --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Connection Details (from Configuration)') }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        These values are read from your environment configuration (`.env` file). For security, the password is not displayed.
                    </p>
                    <dl class="mt-4 space-y-2 text-sm">
                        <div class="flex">
                            <dt class="w-1/3 font-medium text-gray-500 dark:text-gray-400">Driver:</dt>
                            <dd class="w-2/3 text-gray-900 dark:text-gray-100">{{ $driver ?? 'Not Set' }}</dd>
                        </div>
                        <div class="flex">
                            <dt class="w-1/3 font-medium text-gray-500 dark:text-gray-400">Host:</dt>
                            <dd class="w-2/3 text-gray-900 dark:text-gray-100">{{ $host ?? 'Not Set' }}</dd>
                        </div>
                         <div class="flex">
                            <dt class="w-1/3 font-medium text-gray-500 dark:text-gray-400">Port:</dt>
                            <dd class="w-2/3 text-gray-900 dark:text-gray-100">{{ $port ?? 'Not Set' }}</dd>
                        </div>
                         <div class="flex">
                            <dt class="w-1/3 font-medium text-gray-500 dark:text-gray-400">Database:</dt>
                            <dd class="w-2/3 text-gray-900 dark:text-gray-100">{{ $database ?? 'Not Set' }}</dd>
                        </div>
                         <div class="flex">
                            <dt class="w-1/3 font-medium text-gray-500 dark:text-gray-400">Username:</dt>
                            <dd class="w-2/3 text-gray-900 dark:text-gray-100">{{ $username ?? 'Not Set' }}</dd>
                        </div>
                         <div class="flex">
                            <dt class="w-1/3 font-medium text-gray-500 dark:text-gray-400">Password:</dt>
                            <dd class="w-2/3 text-gray-900 dark:text-gray-100">******** (Hidden)</dd>
                        </div>
                    </dl>
                     <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                        To change these settings, modify your `.env` file and clear the configuration cache (`php artisan config:clear`).
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const testBtn = document.getElementById('test-connection-btn');
            const resultDiv = document.getElementById('test-result');
            const statusDiv = document.getElementById('connection-status'); // Get the main status div

            if (testBtn) {
                testBtn.addEventListener('click', function () {
                    resultDiv.textContent = 'Testing...';
                    resultDiv.className = 'mt-3 text-sm text-gray-600 dark:text-gray-400'; // Reset class
                    testBtn.disabled = true;

                    fetch('{{ route("settings.database.test") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json' // Optional: if sending data
                        },
                        // body: JSON.stringify({}) // Optional: if sending data
                    })
                    .then(response => response.json())
                    .then(data => {
                        resultDiv.textContent = data.message;
                        if (data.status === 'success') {
                            resultDiv.className = 'mt-3 text-sm text-green-600 dark:text-green-400';
                            // Update main status display as well
                            statusDiv.textContent = data.message;
                            statusDiv.className = 'mt-2 p-3 rounded border bg-green-100 dark:bg-green-900 border-green-400 dark:border-green-600 text-green-700 dark:text-green-200';
                        } else {
                            resultDiv.className = 'mt-3 text-sm text-red-600 dark:text-red-400';
                            // Update main status display as well
                            statusDiv.textContent = data.message;
                            statusDiv.className = 'mt-2 p-3 rounded border bg-red-100 dark:bg-red-900 border-red-400 dark:border-red-600 text-red-700 dark:text-red-200';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        resultDiv.textContent = 'An error occurred while testing the connection.';
                        resultDiv.className = 'mt-3 text-sm text-red-600 dark:text-red-400';
                    })
                    .finally(() => {
                        testBtn.disabled = false;
                    });
                });
            }
        });
    </script>
    @endpush

</x-app-layout>