<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg p-10">
            <h1 class="text-xl font-semibold">Editar proveedor</h1>
            {{-- Nombre --}}
            <div class="my-4">
                <x-label value="Nombre" class="text-sm" />
                <x-input type="text" class="w-full form-control text-md"
                    placeholder="Ingrese el nombre del proveedor" wire:model.live="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="my-4">
                 <x-label value="Telefono" class="text-sm" />
                    {{-- telefono --}}
                    <x-input type="text" class="w-full form-control text-md"
                        placeholder="Ingrese el numero de telefono del proveedor" wire:model.live="phone" />
                    <x-input-error for="phone" class="mt-2" />
            </div>
            <div class="my-4">
                <x-label value="Direccion" class="text-sm" />
                   {{-- telefono --}}
                   <x-input type="text" class="w-full form-control text-md"
                       placeholder="Ingrese la direccion del proveedor" wire:model.live="address" />
                   <x-input-error for="address" class="mt-2" />
           </div>

            <div class="flex">
                <x-button class="ml-auto font-normal bg-sky-900 mt-5 hover:bg-sky-700" wire:click="save" wire:loading.attr="disabled"
                    wire:target="save">
                    Editar proveedor</x-button>
            </div>

            <div class="bg-gray-300 w-full h-1 my-10 rounded-lg"></div>

            
            
            
        </div>
    </div>
</div>
