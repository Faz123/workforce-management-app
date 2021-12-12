<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Holiday Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div>
                    @forelse ($holidayRequests as $request)
                        <div class="@if ($request->status == 'submitted for approval') bg-yellow-500 @elseif ($request->status == 'reviewed: decision made' && $request->approved == 0) bg-red-500 @elseif ($request->status == 'reviewed: decision made' && $request->approved == 1) bg-green-300 @else bg-white @endif rounded-md border my-4 p-4 text-center max-w-xl m-auto">
                            <div class="font-semibold">Holiday Dates Requested for:</div>
                            <div class="font-semibold my-4">{{ $request->user->name }} {{ $request->user->surname }}</div>
                            <div class="font-semibold my-4">Request Notes:{{ $request->notes }}</div>
                            <div>📅 Start Day: {{ \Carbon\Carbon::parse($request->start_day)->format('jS F, Y') }}</div>
                            <div>📅 End Day: {{ \Carbon\Carbon::parse($request->end_day)->format('jS F, Y') }}</div>
                            <form method="POST" action="/holiday/update-request">
                                @csrf
                                <x-jet-input id="id" name="id" type="hidden" class="mt-1 block w-full" value="{{$request->id}}" />
                                <div class="mt-4">
                                    <x-jet-label for="status" value="{{ __('Status') }}" />
                                    <select name="status" id="status" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full">
                                        <option value="submitted for approval" @if ($request->status == 'submitted for approval') selected @endif>submitted for approval</option>
                                        <option value="reviewed: pending decision" @if ($request->status == 'reviewed: pending decision') selected @endif>reviewed: pending decision</option>
                                        <option value="reviewed: decision made" @if ($request->status == 'reviewed: decision made') selected @endif>reviewed: decision made</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="role" value="{{ __('Approved') }}" />
                                    <select name="approved" id="approved" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full">
                                        <option value="0" @if ($request->approved == 0) selected @endif>Not Approved</option>
                                        <option value="1" @if ($request->approved == 1) selected @endif>Approved</option>
                                    </select>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <x-jet-button class="ml-4">
                                        {{ __('Submit') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                    @empty
                        <p class="font-bold">No upcoming holiday requests 🤔</p>  
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
