<!-- filepath: resources/views/modules/preconstruction/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Preconstruction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Preconstruction Module Overview") }}
                    <!-- Links to specific modules -->
                    <ul class="mt-4 list-disc list-inside">
                        <li><a href="{{ route('modules.preconstruction.qualified_bidders.index') }}" class="text-blue-600 hover:underline">Qualified Bidders</a></li>
                        <li><a href="{{ route('modules.preconstruction.bid_packages.index') }}" class="text-blue-600 hover:underline">Bid Packages</a></li>
                        <li><a href="{{ route('modules.preconstruction.bid_manual.index') }}" class="text-blue-600 hover:underline">Bid Manual</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>