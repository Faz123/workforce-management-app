<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col sm:flex-row">

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
                        <p>
                            Set your business year start and end dates here.
                        </p>
                        <img class="max-h-72 mt-8 m-auto" src="{{url('/images/date_picker.svg')}}" alt="Image"/>
                    </div>

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
        
                    <x-jet-validation-errors class="mb-4" />
        
                    <form method="POST" action="{{ route('save-settings') }}">
                    @csrf
        
                        <div class="mt-4">
                            <x-jet-label for="start_date" value="{{ __('Year Start Date') }}" />
                            <x-jet-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{ $firstSettings->year_start_date }}" required autofocus autocomplete="start_date" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="end_date" value="{{ __('Year End Date') }}" />
                            <x-jet-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{ $firstSettings->year_end_date }}" required autofocus autocomplete="end_date" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Submit') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>