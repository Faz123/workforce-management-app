<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Additional Shifts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col sm:flex-row">

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
                        <p>
                            Add additional shifts for your staff to view and accept.
                        </p>
                        <img class="max-h-72 mt-8 m-auto" src="{{url('/images/undraw_Add_post.svg')}}" alt="Image"/>
                    </div>

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
        
                    <x-jet-validation-errors class="mb-4" />
        
                    <form method="POST" action="/schedule/add-available-shifts">
                    @csrf
                        
                        <!-- Additional Shifts -->

                        <div class="mt-2">
                            <x-jet-label for="week_ending" value="{{ __('Week Ending') }}" />
                            <x-jet-input id="week_ending" class="block mt-1 w-full" type="date" name="week_ending" value="{{ old('week_ending') }}" />
                        </div>
                        <div class="mt-2">
                            <div class="col-span-6 sm:col-span-4">
                                <div class="mt-2">
                                   <x-jet-label for="shift_day" value="{{ __('Shift Day') }}" />
                                    <select name="shift_day" id="shift_day" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full">
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wedneday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                    <x-jet-input-error for="shift_day" class="mt-2"  />  
                                </div>
                                   
                                <div class="mt-2">
                                    <x-jet-label for="shift_start_time" value="{{ __('Start Time') }}" />
                                    <x-jet-input id="shift_start_time" name="start_time" type="Time" value="start_time" class="mt-1 block w-full" />
                                    <x-jet-input-error for="shift_start_time" class="mt-2"  />
                                </div>
                                
                                <div class="mt-2">
                                    <x-jet-label for="shift_finish_time" value="{{ __('Finish Time') }}" />
                                    <x-jet-input id="shift_finish_time" name="end_time" type="Time" value="end_time" class="mt-1 block w-full" />
                                    <x-jet-input-error for="shift_finish_time" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        
                        <div class="mt-2">
                            <x-jet-label for="additional_shift_type" value="{{ __('Shift Type') }}" />
                                <select name="additional_shift_type" id="additional_shift_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full">
                                    <option value="regular">Regular</option>
                                    <option value="overtime">Overtime</option>
                                    <option value="premium">Premium</option>
                                </select>
                            <x-jet-input-error for="additional_shift_type" class="mt-2"  />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Create Availble Shift') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>