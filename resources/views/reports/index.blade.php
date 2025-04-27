<!-- filepath: resources/views/reports/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Session Status -->
            @include('layouts.partials.session-messages')

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Available Reports</h3>

                    @if(empty($availableReports))
                        <p class="text-gray-500 dark:text-gray-400">No reports are currently configured.</p>
                        {{-- Placeholder content --}}
                        <p class="mt-4 text-gray-600 dark:text-gray-300">This section will contain various project reports, such as:</p>
                        <ul class="mt-2 list-disc list-inside text-gray-600 dark:text-gray-400">
                            <li>Cost Summaries</li>
                            <li>RFI Logs</li>
                            <li>Submittal Status</li>
                            <li>Change Order Logs</li>
                            <li>Daily Report Summaries</li>
                            <li>And more...</li>
                        </ul>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($availableReports as $report)
                                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-md">
                                    <h4 class="font-semibold text-md">{{ $report['name'] }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $report['description'] }}</p>
                                    {{-- Check if route exists before creating link --}}
                                    @if(Route::has($report['route']))
                                        <a href="{{ route($report['route']) }}" class="mt-3 inline-block text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                                            View Report &rarr;
                                        </a>
                                    @else
                                         <p class="mt-3 text-sm text-gray-400 dark:text-gray-500">(Report view not yet implemented)</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>