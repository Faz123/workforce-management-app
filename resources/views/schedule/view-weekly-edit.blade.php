<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Weekly Schedule W/E') }} {{ __($date) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col sm:flex-row">
                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
                        <img class="max-h-72 mt-8 m-auto" src="{{url('/images/home_image_1.svg')}}" alt="Image"/>
                    </div>
                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
                        <form method="POST" action="/schedule/update-rota/{{ $date }}">
                            @csrf   
                        @foreach ($users as $user)
                        <details>
                            <summary>{{ $user->name }} {{ $user->surname }}</summary>
                                    @forelse ($rotas as $rota)
                                @if ($rota->week_ending == $date && $rota->user_id == $user->id)  
                                    <div>
                                        <div>
                                            <b>{{ $rota->shift_day }}</b><br/>
                                            <x-jet-input id="id" name="id[]" type="hidden" value="{{$rota->id}}" />
                                            <label for="shift_type">Shift Type:</label>
                                            <select name="shift_type[]" id="shift_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full">
                                                <option selected value="regular">Regular</option>
                                                <option value="overtime">Overtime</option>
                                                <option value="premium">Premium</option>
                                            </select>
                                    
                                            <x-jet-label for="{{$rota->shift_day}}_start_time" value="{{ __('Start Time') }}" />
                                            <x-jet-input id="{{$rota->shift_day}}_start_time" name="start_time[]" type="Time" value="{{$rota->start_time}}" class="mt-1 block w-full" />
                                            <x-jet-input-error for="{{$rota->shift_day}}_start_time" class="mt-2"  />
            
                                            <x-jet-label for="{{$rota->shift_day}}_finish_time" value="{{ __('Finish Time') }}" />
                                            <x-jet-input id="{{$rota->shift_day}}_finish_time" name="end_time[]" type="Time" value="{{$rota->end_time}}" class="mt-1 block w-full" />
                                            <x-jet-input-error for="{{$rota->shift_day}}_finish_time" class="mt-2" />
                                        </div>
                                    </div>
                                @endif
                            @empty
                            <p>No Shifts!</p>
                            @endforelse
                        </details>
                        @endforeach 
                            <div class="flex items-center mt-4">
                                <x-jet-button>
                                    {{ __('Update Rota') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</x-app-layout>