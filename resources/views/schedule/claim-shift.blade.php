<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Claim Shifts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex flex-col sm:flex-row">
                    <h2 class="py-4 text-3xl flex-1">Commit to upcoming shifts</h2>
                    <img class="max-h-72 mt-8 m-auto flex-1" src="{{url('/images/undraw_home.svg')}}" alt="Home Image"/>
                </div>
                <div class="border my-8 p-8 bg-gray-100 rounded-md">
                    <h3 class="text-center py-2 text-2xl">Upcoming Available Shifts</h3>
                    <div>
                        <div class="bg-white rounded-md border my-4 p-4 text-center max-w-xl m-auto">
                            <div class="font-semibold">{{ $additionalShift->shift_day }}</div>
                            <div class="font-semibold">📅 W/E: {{ \Carbon\Carbon::parse($additionalShift->week_ending)->format('jS F, Y') }}</div>
                            <div>🕔 Start time: {{ $additionalShift->start_time }}</div>
                            <div>🕐 End time: {{ $additionalShift->end_time }}</div>
                            <form class="w-full" action="/schedule/additional-shift/commit/{{ $additionalShift->id }}" method="POST">
                                @csrf
                                <div class="mt-4 m-auto">
                                    <x-jet-button class="ml-4" onclick="return confirm('By clicking OK you are comitting to fulfilling this shift')">
                                        {{ __('Commit to Shift') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
