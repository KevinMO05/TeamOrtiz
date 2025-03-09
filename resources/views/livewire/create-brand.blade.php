<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg p-10">
            <h1 class="text-xl font-semibold">Registrar Marca</h1>
            {{-- Nombre --}}
            <div class="my-4">
                <x-label value="Nombre" class="text-sm" />
                <x-input type="text" class="w-full form-control text-md"
                    placeholder="Ingrese el nombre de la marca" wire:model.live="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="flex">
                <x-button class="ml-auto font-normal bg-sky-900 mt-5 hover:bg-sky-700" wire:click="save" wire:loading.attr="disabled"
                    wire:target="save">
                    Registrar Marca</x-button>
            </div>

            <div class="bg-gray-300 w-full h-1 my-10 rounded-lg"></div>

            
            
            
        </div>
    </div>
</div>
