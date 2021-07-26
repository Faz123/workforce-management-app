<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col sm:flex-row">

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
                        <p>
                            You can add new staff members here and assign them to your store to manage their working details.
                        </p>
                        <img class="max-h-72 mt-8 m-auto" src="{{url('/images/home_image_1.svg')}}" alt="Image"/>
                    </div>

                    <div class="flex-1 mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
        
                    <x-jet-validation-errors class="mb-4" />
        
                    <form method="POST" action="{{ route('save-new-staff') }}">
                    @csrf
        
                        <div class="mt-4">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="surname" value="{{ __('Surname') }}" />
                            <x-jet-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="role" value="{{ __('Store Role') }}" />
                            <select name="role" id="role" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full">
                                <option value="1">Customer Service Assistant</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Deputy Manager</option>
                                <option value="4">Management</option>
                            </select>
                        </div>
            
                        <!-- Contracted Hours -->
                        <div class="mt-4">
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="contracted_hours" value="{{ __('Number of Contracted Hours') }}" />
                                <x-jet-input id="contracted_hours" name="contracted_hours" type="number" max="39" class="mt-1 block w-full" :value="old('contracted_hours')" />
                                <x-jet-input-error for="contracted_hours" class="mt-2" />
                            </div>
                        </div>

                        <!-- Holiday Allowance -->
                        <div class="mt-4">
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="holiday_allowance" value="{{ __('Holiday Allowance') }}" />
                                <x-jet-input id="hoiday_allowance" name="holiday_allowance" type="number" max="200" class="mt-1 block w-full" :value="old('holiday_allowance')" />
                                <x-jet-input-error for="holiday_allowance" class="mt-2" />
                            </div>
                        </div>

                        <!-- Employee Number -->
                        <div class="mt-4">
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="staff_number" value="{{ __('Employee Number') }}" />
                                <x-jet-input id="staff_number" name="staff_number" type="number" max="999999" class="mt-1 block w-full" :value="old('staff_number')" />
                                <x-jet-input-error for="staff_number" class="mt-2" />
                            </div>
                        </div>
            
                        <!-- Store Code -->
                        <div class="mt-4">
                            <x-jet-label for="store_code" value="{{ __('Store') }}" />
                            <select name="store_code" id="store_code" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full">
                                <option value="71602">Test Store 1</option>
                                <option value="71603">Test Store 2</option>
                                <option value="71604">Test Store 3</option>
                            </select>
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                    


            
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Add Staff Member') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>