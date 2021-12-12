<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Schedules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col sm:flex-row">

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
                        <p>
                            You can add new staff members here and assign them to your store to manage their working details.
                        </p>
                        <img class="max-h-72 mt-8 m-auto" src="{{url('/images/date_picker.svg')}}" alt="Image"/>
                    </div>

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
                        
                            <p>Select the options below to create your rota</p>
                       
                    <x-jet-validation-errors class="mb-4" />
        
                    <form method="POST" action="/schedule/create-rota">
                    @csrf
                        
                        <!-- Create rota -->

                        <div class="mt-4">

                            <div class="mt-4">
                                <x-jet-label for="week_number" value="{{ __('Week Number') }}" />
                                <x-jet-input id="week_number" class="block mt-1 w-full" type="number" min="1" max="53" name="week_number" value="{{old('week_number') }}" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="week_ending" value="{{ __('Week Ending') }}" />
                                <x-jet-input id="week_ending" class="block mt-1 w-full" type="date" name="week_ending" value="{{ old('week_ending') }}" />
                            </div>
                            
                            <div class="mt-4">
                                <x-jet-checkbox id="importShifts" name="import_shifts" checked></x-jet-checkbox>
                                <label class="mx-4" for="importShifts">Import Standard Shifts?</label>
                            </div>

                        </div>
                        

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Create Rota') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>