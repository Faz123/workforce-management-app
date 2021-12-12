<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex flex-col sm:flex-row">
                    <h2 class="py-4 text-3xl flex-1">Your Dashboard</h2>
                    <img class="max-h-72 mt-8 m-auto flex-1" src="{{url('/images/undraw_home.svg')}}" alt="Home Image"/>
                </div>
                <div class="border my-8 p-8 bg-gray-100 rounded-md">
                    <h3 class="text-center py-2 text-2xl">Your Current Rota</h3>
                    <h2 class="my-4 px-2">Week Ending: <span class="font-bold">{{\Carbon\Carbon::parse($weekEnd)->format('jS F, Y') }}</span></h2>
                <div class="my-4 px-2 flex flex-col justify-center sm:flex-row">
                    @forelse ($rotas as $rota)
                    @if ($rota->week_ending == $weekEnd )
                    <div class="flex-1 border-l @if ($loop->last)border-r @endif">
                        <div class="px-4 py-2 text-center border-t border-b">
                           <span class="px-4 font-bold">{{ $rota->shift_day }}</span> 
                        </div>
                        <div class="px-4 text-center border mt-6 mx-2 rounded-md @if ($rota->shift_type == 'regular' && $rota->start_time!= NULL) bg-green-300 @elseif($rota->shift_type == 'overtime') bg-yellow-300 @else bg-blue-300 @endif">
                            @if ($rota->start_time != null)
                                <p class="text-sm my-3">Start Time:</p>
                                <span class="font-bold text-sm block my-4">{{ $rota->start_time }}</span>
                                <p class="text-sm my-3">End Time:</p>
                                <span class="font-bold text-sm block my-4">{{ $rota->end_time }}</span>
                                @if ($rota->shift_type != null)
                                <p class="text-sm my-3">Shift Type:</p>
                                <span class="font-bold text-sm block my-4">{{ $rota->shift_type }}</span>
                                @endif
                            @else
                                <span class="font-bold text-sm block my-4">Day off! 🎉</span> 
                            @endif
                        </div>
                    </div>
                    @endif
                    @empty
                       <div class="py-4 text-lg">No rota found for this week! 🤔</div>         
                    @endforelse
                </div>
                </div>
                <div class="border my-8 p-8 bg-gray-100 rounded-md">
                    <h3 class="text-center py-2 text-2xl">Upcoming Available Shifts</h3>
                    <div>
                        @forelse ($additionalShifts as $shift)
                        @if ($shift->week_ending >= $weekEnd && $shift->shift_filled !== 1)
                            <div class="bg-white rounded-md border my-4 p-4 text-center max-w-xl m-auto">
                                <div class="font-semibold">{{ $shift->shift_day }}</div>
                                <div class="font-semibold">📅 W/E: {{ \Carbon\Carbon::parse($shift->week_ending)->format('jS F, Y') }}</div>
                                <div>🕔 Start time: {{ $shift->start_time }}</div>
                                <div>🕐 End time: {{ $shift->end_time }}</div>
                                <a class="block rounded-md my-4 p-2 bg-purple hover:bg-gray-200 text-white hover:text-purple" href="/schedule/claim-shift/{{ $shift->id }}">Claim</a>
                            </div>
                        @endif

                        @empty
                           <p class="font-bold">No upcoming available shifts! 🤔</p>  
                        @endforelse
                    </div>
                </div>
                <div class="border my-8 p-8 bg-gray-100 rounded-md">
                    <h3 class="text-center py-2 text-2xl">Holiday Requests</h3>
                    <div>
                        @forelse ($holidayRequests as $request)
                            <div class="@if ($request->status == 'submitted for approval') bg-yellow-500 @elseif ($request->status == 'reviewed: decision made' && $request->approved == 0) bg-red-500 @elseif ($request->status == 'reviewed: decision made' && $request->approved == 1) bg-green-300 @else bg-white @endif rounded-md border my-4 p-4 text-center max-w-xl m-auto">
                                <div class="font-semibold">Holiday Dates Requested</div>
                                <div>📅 Start Day: {{ \Carbon\Carbon::parse($request->start_day)->format('jS F, Y') }}</div>
                                <div>📅 End Day: {{ \Carbon\Carbon::parse($request->end_day)->format('jS F, Y') }}</div>
                                <div>Status: <span class="font-semibold">{{ $request->status }}</span></div>
                                <div>Approved?: 
                                    <span class="font-semibold">@if ($request->approved == 0 )
                                        No
                                    @else
                                        Yes
                                    @endif
                                 </span>
                                </div>
                            </div>
                        @empty
                           <p class="font-bold">No upcoming holiday requests 🤔</p>  
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
