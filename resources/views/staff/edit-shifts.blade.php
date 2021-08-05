<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{$user->name}} {{$user->surname}}'s Shifts
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
                        </div>
                        <div class="mt-4">
                            @foreach ($user->shifts as $shift)
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label class="mt-4 mb-4" for="shift_day_{{ $shift->shift_day }}" value="{{$shift->shift_day}}" />
                                <x-jet-input id="shift_day_{{ $shift->shift_day }}" name="shift_day[]" type="hidden" class="mt-1 block w-full" value="{{$shift->shift_day}}" />
                                <x-jet-input-error for="shift_day_{{$shift->shift_day}}" class="mt-2" />

                                <x-jet-label for="{{$shift->shift_day}}_start_time" value="{{ __('Start Time') }}" />
                                <x-jet-input id="{{$shift->shift_day}}_start_time" name="start_time[]" type="Time" value="{{$shift->start_time}}" class="mt-1 block w-full" />
                                <x-jet-input-error for="{{$shift->shift_day}}_start_time" class="mt-2"  />

                                <x-jet-label for="{{$shift->shift_day}}_finish_time" value="{{ __('Finish Time') }}" />
                                <x-jet-input id="{{$shift->shift_day}}_finish_time" name="end_time[]" type="Time" value="{{$shift->end_time}}" class="mt-1 block w-full" />
                                <x-jet-input-error for="{{$shift->shift_day}}_finish_time" class="mt-2" />
                            </div>
                            @endforeach
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