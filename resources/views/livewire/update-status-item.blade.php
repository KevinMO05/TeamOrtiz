<div>
    <div>
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-lime-300 bg-opacity-50 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <h1 class="text-lg font-semibold ml-3">Suplemento</h1>
                <div class="mt-4 grid grid-cols-3 gap-4  ">
                    <div class="flex flex-col text-center">
                        <span class="font-semibold mb-2">Nombre</span>
                        <div class="colspan-1 text-lg ml-3"> {{ $name }}</div>
                    </div>
                    <div class="flex flex-col text-center">
                        <span class="font-semibold mb-2">Proveedor</span>
                        <div class="colspan-1 text-lg text-center"> {{ $supplier_name }}</div>
                    </div>
                    <div class="flex flex-col text-center">
                        <span class="font-semibold mb-2">Marca</span>
                        <div class="colspan-1 text-lg text-center"> {{ $brand_name }} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-5 w-full max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full flex flex-col justify-center item">
            <h2 class="text-lg font-bold mb-2">Estado del repuesto</h2>
            <div class="flex space-x-9">
                <label for="" class="mr-6 text-md">
                    <input wire:model.live="state" type="radio" name="state" value="Dañado">
                    Dañado
                </label>
                <label for="" class="mr-6 text-md">
                    <input wire:model.live="state" type="radio" name="state" value="Disponible">
                    Disponible
                </label>

                <label for="" class="text-md">
                    <input wire:model.live="state" type="radio" name="state" value="Vendido">
                    Vendido
                </label>
            </div>

            <div class="flex items-end justify-end">

                <x-button class="ml-auto font-normal  bg-sky-700 mt-3" wire:click="save" wire:loading.attr="disabled"
                    wire:target="save">
                    Actualizar estado
                </x-button>
            </div>
        </div>
    </div>
</div>
