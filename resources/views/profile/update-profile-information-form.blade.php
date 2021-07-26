<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="surname" value="{{ __('Surname') }}" />
            <x-jet-input id="surname" type="text" class="mt-1 block w-full" wire:model.defer="state.surname" autocomplete="surname" />
            <x-jet-input-error for="surname" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Role -->
        <?php 
        $roles = array('1' => "Sales Assistant" , '2' => "Supervisor", '3' => "Management" );
        ?>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="role" value="{{ __('Role') }}" />
            <p class="mt-1"><?=$roles[$this->user->role] ?></p>
        </div>

        <!-- Store Code -->
        <?php 
        $storeCode = array('71602' => "Test Store 1" , '71603' => "Test Store 2", '71604' => "Test Store 3" );
        ?>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="store_code" value="{{ __('Store Code') }}" />
            <p class="mt-1"><?=$storeCode[$this->user->store_code] ?></p>
        </div>

        <!-- Contracted Hours -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="contracted_hours" value="{{ __('Hours') }}" />
            <x-jet-input id="contracted_hours" type="number" max="39" class="mt-1 block w-full" wire:model.defer="state.contracted_hours" />
            <x-jet-input-error for="contracted_hours" class="mt-2" />
        </div>

        <!-- Staff Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="staff_number" value="{{ __('Staff Number') }}" />
            <x-jet-input id="staff_number" type="number" aria-placeholder="Enter Staff Number" class="mt-1 block w-full" wire:model.defer="state.staff_number" />
            <x-jet-input-error for="staff_number" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Profile information saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
