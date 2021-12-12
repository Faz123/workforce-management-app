<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Additional Shifts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex flex-col sm:flex-row">
                    <h2 class="py-4 text-3xl flex-1">Additional Shifts</h2>
                    <img class="max-h-72 mt-8 m-auto flex-1" src="{{url('/images/undraw_home.svg')}}" alt="Home Image"/>
                </div>
                <div class="border my-8 p-8 bg-gray-100 rounded-md">
                    <div>
                        <div class="bg-white rounded-md border my-4 p-4 text-center max-w-xl m-auto">
                            @forelse ($additionalShifts as $shift)
                            @if (Auth::user()->role == '3')
                               <div class="font-semibold">Staff Member: <span>{{ $shift->user->name }} {{ $shift->user->surname }}</span></div>
                            @endif
                               <div class="font-semibold">{{ $shift->shift_day }}</div>
                                <div class="font-semibold">📅 W/E: {{ \Carbon\Carbon::parse($shift->week_ending)->format('jS F, Y') }}</div>
                                <div>🕔 Start time: {{ $shift->start_time }}</div>
                                <div>🕐 End time: {{ $shift->end_time }}</div> 
                                <div class="bg-green-400 rounded-md py-2 my-2"><p>Confirmed</p></div>
                                @empty
                                <b>No agreed additional shifts at the moment</b>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
