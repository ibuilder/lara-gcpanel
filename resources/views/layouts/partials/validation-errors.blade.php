<!-- filepath: resources/views/layouts/partials/validation-errors.blade.php -->
@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-200 rounded']) }} role="alert">
        <p class="font-bold">{{ __('Whoops! Something went wrong.') }}</p>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif