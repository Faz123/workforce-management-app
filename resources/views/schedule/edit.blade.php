<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="p-4">Select a Schedule to Edit</h2>
               @forelse ($rotas as $rota)
                    <div class="flex px-4 py-4 items-center box-border justify-between">
                        <div>
                            <h3>Week Number:{{ $rota->week_number }} Week Ending: {{ $rota->week_ending }}</h3>
                        </div>
                        <div class="flex justify-between box-border text-center">
                            <a class="mx-2" href="schedule/edit-rota/{{ $rota->week_ending }}"><div class="px-2 py-2 bg-blue-700 text-white focus:bg-opacity-80 hover:bg-opacity-80 rounded-md">Edit Rota</div></a>
                        </div>
                   </div>
               @empty
                   <h2>No Rotas found!</h2>
               @endforelse
            </div>
        </div>
    </div>
</x-app-layout>