<div>
    <div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-xl font-semibold">Editar Suplementos</h1>
                {{-- Nombre --}}
                <div class="my-4">
                    <x-label value="Nombre" class="text-sm" />
                    <x-input type="text" class="w-full form-control text-md"
                        placeholder="Ingrese el nombre del suplemento" wire:model.live="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>
    
                <div class="my-4 grid grid-cols-2 gap-4">
                    <div class="colspan-1">
                        {{-- DNI --}}
                        <x-label value="Proveedor" class="text-sm" />
                        <select name="type" wire:model.live="supplier_id" id=""
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-500 w-full form-control text-md">
                            <option value="" selected disabled>Seleccione el proveedor</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="supplier_id" class="mt-2" />
                    </div>
                    <div class="colspan-1">
                        <x-label value="Marca" class="text-sm" />
                        <select name="type" wire:model.live="brand_id" id=""
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-500 w-full form-control text-md">
                            <option value="" selected disabled>Seleccione la marca</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="supplier_id" class="mt-2" />
                    </div>
                </div>
                {{-- Email --}}
                <div class="my-4">
                    <x-label value="Stock" class="text-sm" />
                    <x-input type="text" class="w-full form-control text-md"
                        placeholder="Ingrese el stock del suplemento" wire:model.live="stock" />
                    <x-input-error for="stock" class="mt-2" />
                </div>
    
                <div class="flex">
                    <x-button class="ml-auto font-normal bg-sky-900 mt-5 hover:bg-sky-700" wire:click="save" wire:loading.attr="disabled"
                        wire:target="save">
                        Editar suplemento</x-button>
                </div>
    
                <div class="bg-gray-300 w-full h-1 my-10 rounded-lg"></div>
    
                
                
                
                
            </div>
        </div>
    </div>
    