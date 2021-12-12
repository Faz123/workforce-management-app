<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Request Holiday Dates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col sm:flex-row">
                    <p class="p-4 flex-1">Select a start and end date for your holidays to submit to your line Manager for approval.</p>
                    <img class="max-h-72 mt-8 m-auto flex-1" src="{{url('/images/undraw_calender.svg')}}" alt="Calender Image"/>
                </div>
                <div class="flex flex-col sm:flex-row p-6">
                    <form method="POST" action="{{ route('save-holiday-request') }}" class="w-full" >
                        @csrf
                        <div class="flex flex-col sm:flex-row">
                            <div class="py-2 mx-8 flex-1">
                                <x-jet-label class="mt-4 mb-4" for="start_date" value="Holiday Start Date:" />
                                <x-jet-input id="start_date" name="start_date" type="date" class="mt-1 block w-full" value="{{ old('start_date') }}" />
                                <x-jet-input-error for="start_date" class="mt-2" />
                            </div>
                            
                            <div class="py-2 mx-8 flex-1">
                                <x-jet-label class="mt-4 mb-4" for="end_date" value="Holiday End Date:" />
                                <x-jet-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" value="{{ old('end_date') }}" />
                                <x-jet-input-error for="end_date" class="mt-2" />  
                            </div>
                        </div>
                        <div class="py-2 mx-8">
                            <x-jet-label class="mt-4 mb-4" for="notes" value="Notes related to holiday request:" />
                            <x-text-area name="notes" id="notes" />
                            <x-jet-input-error for="notes" class="mt-2" />  
                        </div>
                        <div class="flex items-center justify-end mt-4 mx-8">
                            <x-jet-button class="ml-4">
                                {{ __('Submit') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>