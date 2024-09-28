<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('contacts.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Andrea Garcia" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Job -->
                        <div>
                            <x-input-label for="job" :value="__('Job')" />
                            <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" placeholder="Account Manager" :value="old('job')" required autocomplete="job" />
                            <x-input-error :messages="$errors->get('job')" class="mt-2" />
                        </div>

                        <!-- Department -->
                        <div>
                            <x-input-label for="department" :value="__('Department')" />
                            <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" placeholder="Finance" :value="old('department')" required autocomplete="department" />
                            <x-input-error :messages="$errors->get('department')" class="mt-2" />
                        </div>

                        <!-- Destination_id -->
                        <div>
                            <x-input-label for="destination_id" :value="__('Destination')" />
                                <select name="destination_id" class="block mt-1 w-full" id="destination_id">
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach
                                </select>
                            <x-input-error :messages="$errors->get('destination_id')" class="mt-2" />
                        </div>

                        <!-- Extension -->
                        <div>
                            <x-input-label for="extension" :value="__('Extension')" />
                            <x-text-input id="extension" class="block mt-1 w-full" type="number" name="extension" placeholder="1111" :value="old('extension')" required autocomplete="extension" />
                            <x-input-error :messages="$errors->get('extension')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="example@email.com" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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