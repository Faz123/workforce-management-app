<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-12">
                    <h1>Select a Rota to export:</h1>
                    @foreach ($rotas as $rota)
                        <div class="my-2 py-2">Week Ending: {{ \Carbon\Carbon::parse($rota->week_ending)->format('jS F, Y') }} <a class="bg-blue-800 text-white p-2 rounded-md" href="/schedule/export/{{ $rota->week_ending }}">Export</a></div>
                    @endforeach
               </div>
            </div>
        </div>
    </div>
</x-app-layout>