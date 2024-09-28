<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('destinations.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Destination Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Bahia Principe Grand Tulum" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Country -->
                        <div>
                            <x-input-label for="country" :value="__('Country')" />
                            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" placeholder="Mexico" :value="old('country')" required autocomplete="country" />
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-secondary-button class="ms-4">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>