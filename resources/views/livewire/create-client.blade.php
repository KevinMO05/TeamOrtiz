<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <h1 class="text-xl font-semibold">Registrar Cliente</h1>
            {{-- Nombre --}}
            <div class="my-4">
                <x-label value="Nombre" class="text-sm" />
                <x-input type="text" class="w-full form-control text-md"
                    placeholder="Ingrese el nombre completo del cliente" wire:model.live="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="my-4 grid grid-cols-2 gap-4">
                <div class="colspan-1">
                    {{-- DNI --}}
                    <x-label value="Dni" class="text-sm" />
                    <x-input type="text" class="w-full form-control text-md" placeholder="Ingrese el dni del cliente"
                        wire:model.live="dni" />
                    <x-input-error for="dni" class="mt-2" />
                </div>
                <div class="colspan-1">
                    <x-label value="Telefono" class="text-sm" />
                    {{-- telefono --}}
                    <x-input type="text" class="w-full form-control text-md"
                        placeholder="Ingrese el numero de telefono del cliente" wire:model.live="phone" />
                    <x-input-error for="phone" class="mt-2" />
                </div>
            </div>
            {{-- Email --}}
            <div class="my-4">
                <x-label value="Email" class="text-sm" />
                <x-input type="text" class="w-full form-control text-md"
                    placeholder="Ingrese el correo electronico del cliente" wire:model.live="email" />
                <x-input-error for="email" class="mt-2" />
            </div>


            <div class="bg-gray-300 w-full h-1 my-10 rounded-lg"></div>


            <h1 class="text-xl font-semibold">Registrar Membresia</h1>
            {{-- Tipo de membresia --}}
            <div class="my-4 grid grid-cols-2 gap-4">
                <div class="colspan-1">
                    <x-label value="Tipo de membresia" class="text-sm" />
                    <select name="type" wire:model.live="membership_type" id=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-500 w-full form-control text-md">
                        <option value="">Seleccione el tipo de membresia</option>
                        <option value="1">Mensual</option>
                        <option value="2">Anual</option>
                    </select>
                    <x-input-error for="membership_type" class="mt-2" />
                </div>
                <div class="colspan-1">
                    <x-label value="Estado de membresía" class="text-sm" />
                    <select name="state" wire:model.live="membership_state" id=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-500 w-full form-control text-md">
                        <option value="">Seleccione el estado de membresia</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                    <x-input-error for="membership_state" class="mt-2" />
                </div>
            </div>

            <div class="my-4 grid grid-cols-2 gap-4">
                <div class="colspan-1">
                    {{-- DNI --}}
                    <x-label value="Fecha de inicio" class="text-sm" />
                    <x-input type="date" class="w-full form-control text-md text-gray-500" placeholder="Ingrese la fecha de inicio de la membresía"
                        wire:model.live="membership_start" />
                    <x-input-error for="membership_start" class="mt-2" />
                </div>
                <div class="colspan-1">
                    <x-label value="Fecha de fin" class="text-sm" />
                    <x-input type="date" class="w-full form-control text-md text-gray-500" placeholder="Ingrese la fecha de fin de la membresía"
                        wire:model.live="membership_end" />
                    <x-input-error for="membership_end" class="mt-2" />
                </div>
            </div>
            <div class="flex">
                <x-button class="ml-auto font-normal bg-sky-900 mt-5 hover:bg-sky-700" wire:click="save" wire:loading.attr="disabled"
                    wire:target="save">
                    Registrar cliente y membresía</x-button>
            </div>
            
        </div>
    </div>
</div>
