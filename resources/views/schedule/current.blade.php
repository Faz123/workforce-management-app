<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Current Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="my-4 px-2">Week Ending {{ $weekEnd }}</h2>
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
        </div>
    </div>
</x-app-layout>