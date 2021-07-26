<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Staff Shifts') }}
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
                        <img class="max-h-72 mt-8 m-auto" src="{{url('/images/home_image_1.svg')}}" alt="Image"/>
                    </div>

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
        
                    <x-jet-validation-errors class="mb-4" />
        
                    <form method="POST" action="/manage-staff/{{ $user->id }}/update-shifts">
                    @csrf
                        
                        <!-- Standard Shift -->

                        <div class="mt-4">
                            <h3>Regular Shifts</h3>
                            <p>If this staff member will work regular shifts you can input them below</p>

                            {{-- {{ $user->shifts }} --}}
                        </div>

                        <!-- Employee Number -->
                        <div class="mt-4">
                            <!-- Sunday -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_sunday" value="{{ __('Sunday') }}" />
                                <x-jet-input id="shift_day_sunday" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="Sunday" />
                                <x-jet-input-error for="shift_day_sunday" class="mt-2" />

                                <x-jet-label for="sunday_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="sunday_start_time" name="start_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="sunday_start_time" class="mt-2" />

                                <x-jet-label for="sunday_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="sunday_finish_time" name="end_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="sunday_finish_time" class="mt-2" />
                            </div>
                            <!-- Monday -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_monday" value="{{ __('Monday') }}" />
                                <x-jet-input id="shift_day_monday" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="Monday" />
                                <x-jet-input-error for="shift_day_monday" class="mt-2" />

                                <x-jet-label for="monday_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="monday_start_time" name="start_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="monday_start_time" class="mt-2" />

                                <x-jet-label for="monday_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="monday_finish_time" name="end_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="monday_finish_time" class="mt-2" />
                            </div>
                            <!-- Tuesday -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_tuesday" value="{{ __('Tuesday') }}" />
                                <x-jet-input id="shift_day_tuesday" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="Tuesday" />
                                <x-jet-input-error for="shift_day_tuesday" class="mt-2" />

                                <x-jet-label for="tuesday_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="tuesday_start_time" name="start_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="tuesday_start_time" class="mt-2" />

                                <x-jet-label for="tuesday_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="tuesday_finish_time" name="end_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="tuesday_finish_time" class="mt-2" />
                            </div>
                            <!-- Wednesday -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_wednesday" value="{{ __('Wednesday') }}" />
                                <x-jet-input id="shift_day_wednesday" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="Wednesday" />
                                <x-jet-input-error for="shift_day_wednesday" class="mt-2" />

                                <x-jet-label for="wednesday_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="wednesday_start_time" name="start_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="wednesday_start_time" class="mt-2" />

                                <x-jet-label for="wednesday_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="wednesday_finish_time" name="end_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="wednesday_finish_time" class="mt-2" />
                            </div>
                            <!-- Thursday -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_thursday" value="{{ __('Thursday') }}" />
                                <x-jet-input id="shift_day_thursday" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="Thursday" />
                                <x-jet-input-error for="shift_day_thursday" class="mt-2" />

                                <x-jet-label for="thursday_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="thursday_start_time" name="start_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="thursday_start_time" class="mt-2" />

                                <x-jet-label for="thursday_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="thursday_finish_time" name="end_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="thursday_finish_time" class="mt-2" />
                            </div>
                            <!-- Friday -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_friday" value="{{ __('Friday') }}" />
                                <x-jet-input id="shift_day_friday" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="Friday" />
                                <x-jet-input-error for="shift_day_friday" class="mt-2" />

                                <x-jet-label for="friday_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="friday_start_time" name="start_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="friday_start_time" class="mt-2" />

                                <x-jet-label for="friday_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="friday_finish_time" name="end_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="friday_finish_time" class="mt-2" />
                            </div>
                            <!-- Saturday -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_saturday" value="{{ __('Saturday') }}" />
                                <x-jet-input id="shift_day_saturday" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="Saturday" />
                                <x-jet-input-error for="shift_day_saturday" class="mt-2" />

                                <x-jet-label for="saturday_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="saturday_start_time" name="start_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="saturday_start_time" class="mt-2" />

                                <x-jet-label for="saturday_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="saturday_finish_time" name="end_time[]" type="Time" class="mt-1 block w-full" />
                                <x-jet-input-error for="saturday_finish_time" class="mt-2" />
                            </div>
                        </div>


            
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Update Staff Shifts') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>