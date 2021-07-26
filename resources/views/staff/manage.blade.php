<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg box-border">
                
                    @foreach ($users as $user) 
                
                        <div class="flex px-4 py-4 items-center box-border justify-between">
                            <div>
                                <h3>{{ $user->name . ' ' . $user->surname }}</h3>
                            </div>
                            <div class="flex justify-between box-border text-center">
                                <a class="mx-2" href="/manage-staff/{{ $user->id }}/shifts"><div class="px-2 py-2 w-20 bg-green-700 text-white focus:bg-opacity-80 hover:bg-opacity-80 rounded-md">Shifts</div></a><a class="mx-2" href="/manage-staff/{{ $user->id }}/edit"><div class="px-2 py-2 w-20 bg-blue-700 text-white focus:bg-opacity-80 hover:bg-opacity-80 rounded-md">Edit</div></a><a class="mx-2" onclick="return confirm('Are you sure you want to delete this user? This action is not reversible')" href="/manage-staff/{{ $user->id }}/delete"><div class="px-2 py-2 w-20 bg-red-700 hover:bg-opacity-80 focus:bg-opacity-80 text-white rounded-md">Delete</div></a>
                            </div>
                        </div>
                    
                    @endforeach
                     
                    
            </div>
        </div>
    </div>
</x-app-layout>