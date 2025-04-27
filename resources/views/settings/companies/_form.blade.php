<!-- filepath: resources/views/settings/companies/_form.blade.php -->
@csrf
<div class="space-y-4">
    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Company Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $company->name ?? '')" required autofocus autocomplete="organization" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Address -->
    <div>
        <x-input-label for="address" :value="__('Address')" />
        <textarea id="address" name="address" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('address', $company->address ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    <!-- Phone -->
    <div>
        <x-input-label for="phone" :value="__('Phone Number')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone', $company->phone ?? '')" autocomplete="tel" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <!-- Website -->
    <div>
        <x-input-label for="website" :value="__('Website URL')" />
        <x-text-input id="website" class="block mt-1 w-full" type="url" name="website" :value="old('website', $company->website ?? '')" placeholder="https://example.com" autocomplete="url" />
        <x-input-error :messages="$errors->get('website')" class="mt-2" />
    </div>
</div>

<div class="flex items-center justify-end mt-6">
     <a href="{{ route('settings.company_management.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mr-4">
        {{ __('Cancel') }}
    </a>
    <x-primary-button>
        {{ isset($company) ? __('Update Company') : __('Create Company') }}
    </x-primary-button>
</div>