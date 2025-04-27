<!-- filepath: resources/views/layouts/partials/session-messages.blade.php -->
@if (session('success'))
    <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 rounded" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-200 rounded" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="mb-4 p-4 bg-yellow-100 dark:bg-yellow-900 border border-yellow-400 dark:border-yellow-600 text-yellow-700 dark:text-yellow-200 rounded" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div class="mb-4 p-4 bg-blue-100 dark:bg-blue-900 border border-blue-400 dark:border-blue-600 text-blue-700 dark:text-blue-200 rounded" role="alert">
        {{ session('info') }}
    </div>
@endif

{{-- Display validation errors if needed outside of forms --}}
@if ($errors->any() && !isset($hideErrors)) {{-- Check for a flag to hide general errors if handled by form components --}}
    <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-200 rounded" role="alert">
        <p class="font-bold">Please correct the errors below:</p>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif