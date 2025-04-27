<!-- filepath: resources/views/settings/project_info.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Session Status -->
            @include('layouts.partials.session-messages')

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('settings.project_info.update', $projectInfo->id) }}"> {{-- Assuming ID 1 or using the object's ID --}}
                        @csrf
                        @method('PUT') {{-- Use PUT for update --}}

                        <!-- Project Name -->
                        <div>
                            <x-input-label for="project_name" :value="__('Project Name')" />
                            <x-text-input id="project_name" class="block mt-1 w-full" type="text" name="project_name" :value="old('project_name', $projectInfo->project_name)" autofocus />
                            <x-input-error :messages="$errors->get('project_name')" class="mt-2" />
                        </div>

                        <!-- Project Number -->
                        <div class="mt-4">
                            <x-input-label for="project_number" :value="__('Project Number')" />
                            <x-text-input id="project_number" class="block mt-1 w-full" type="text" name="project_number" :value="old('project_number', $projectInfo->project_number)" />
                            <x-input-error :messages="$errors->get('project_number')" class="mt-2" />
                        </div>

                        <!-- Project Address -->
                        <div class="mt-4">
                            <x-input-label for="project_address" :value="__('Project Address')" />
                            <textarea id="project_address" name="project_address" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('project_address', $projectInfo->project_address) }}</textarea>
                            <x-input-error :messages="$errors->get('project_address')" class="mt-2" />
                        </div>

                        <!-- Client Name -->
                        <div class="mt-4">
                            <x-input-label for="client_name" :value="__('Client Name')" />
                            <x-text-input id="client_name" class="block mt-1 w-full" type="text" name="client_name" :value="old('client_name', $projectInfo->client_name)" />
                            <x-input-error :messages="$errors->get('client_name')" class="mt-2" />
                        </div>

                        <!-- Project Manager Name -->
                        <div class="mt-4">
                            <x-input-label for="project_manager_name" :value="__('Project Manager Name')" />
                            <x-text-input id="project_manager_name" class="block mt-1 w-full" type="text" name="project_manager_name" :value="old('project_manager_name', $projectInfo->project_manager_name)" />
                            <x-input-error :messages="$errors->get('project_manager_name')" class="mt-2" />
                        </div>

                        {{-- Add other fields from the model here --}}

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Save Project Info') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>