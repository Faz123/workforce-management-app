<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Weekly Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-scroll sm:overflow-x-hidden shadow-xl sm:rounded-lg p-6">
               <p>Week Ending: <span class="font-bold">{{ $weekEnd }}</span></p>
               @if (count($rotas) > 0 && $haveRotas == true)
                   <table class="text-center w-full my-8 border-collapse border border-gray-300">
                    <tr class="border-collapse border border-gray-300">
                        <th class="border-collapse border border-gray-300 px-4">Staff Member</th>
                        <th class="border-collapse border border-gray-300 px-4">Sunday</th>
                        <th class="border-collapse border border-gray-300 px-4">Monday</th>
                        <th class="border-collapse border border-gray-300 px-4">Tuesday</th>
                        <th class="border-collapse border border-gray-300 px-4">Wednesday</th>
                        <th class="border-collapse border border-gray-300 px-4">Thursday</th>
                        <th class="border-collapse border border-gray-300 px-4">Friday</th>
                        <th class="border-collapse border border-gray-300 px-4">Saturday</th>
                    </tr>
                @foreach ($users as $user)
                    <tr class="border-collapse border border-gray-300">
                        <td class="border-collapse border border-gray-300">{{ $user->name }}</td>
                    @foreach ($rotas as $rota)
                        @if ($user->id == $rota->user_id && $rota->week_ending == $weekEnd)
                            @if ($rota->start_time)
                                <td class="border-collapse border border-gray-300 px-4 px-2 bg-green-300">{{ $rota->start_time }}<br/>{{ $rota->end_time }}<br/>{{ $rota->shift_type }}</td>
                            @else
                                <td class="border-collapse border border-gray-300 px-4 px-2 bg-blue-300">Day off 🎉</td>
                            @endif
                        @endif
                    @endforeach 
                </tr>
                @endforeach
            </table>
               @else
                   <p class="font-bold">No rota found for the current week! 🤔</p>  
               @endif
            </div>
        </div>
    </div>
</x-app-layout>