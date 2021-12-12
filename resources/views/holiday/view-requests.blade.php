<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Holiday Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="border my-8 p-8 bg-gray-100 rounded-md">
                    <h3 class="text-center py-2 text-2xl">Holiday Requests</h3>
                    <div>
                        @forelse ($holidayRequests as $request)
                            <div class="@if ($request->status == 'submitted for approval') bg-yellow-500 @else bg-white @endif rounded-md border my-4 p-4 text-center max-w-xl m-auto">
                                <div class="font-semibold">Holiday Dates Requested</div>
                                <div class="font-semibold">Staff Name: {{ $request->user->name }} {{ $request->user->surname }}</div>
                                <div>📅 Start Day: {{ \Carbon\Carbon::parse($request->start_day)->format('jS F, Y') }}</div>
                                <div>📅 End Day: {{ \Carbon\Carbon::parse($request->end_day)->format('jS F, Y') }}</div>
                                <div>Status: {{ $request->status }}</div>
                                <div>Approved?: 
                                    @if ($request->approved == 0 )
                                        No
                                    @else
                                        Yes
                                    @endif
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
