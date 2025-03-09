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

    <div class=" my-10">
        <div class="flex justify-center items-center mt-6  w-full max-w-4xl mx-auto">
            <div class=" p-6 ">
                <h3 class="text-lg font-semibold">Agregar codigo</h3>
                <p class="text-gray-600">En esta seccion podrá agregar nuevo codigo de suplemento introduciendo un
                    número de serie.</p>
            </div>

            <div class="w-full ">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <x-label value="Codigo" class="text-sm" />
                    <x-input type="text" class="w-full form-control text-md mb-3"
                        placeholder="Ingrese el codigo del suplemento" wire:model.live="code" />
                    <x-input-error for="code" class="mt-2" />

                    <x-label value="Fecha de adquisición" class="text-sm" />
                    <x-input type="date" class="w-full form-control text-md md mb-3"
                        wire:model.live="purchase_date" />
                    <x-input-error for="purchase_date" class="mt-2" />

                    <x-label value="Fecha de expiración" class="text-sm" />
                    <x-input type="date" class="w-full form-control text-md md mb-3"
                        wire:model.live="expiration_date" />
                    <x-input-error for="expiration_date" class="mt-2" />

                    <x-label value="Estado" class="text-sm" />
                    <select name="type" wire:model.live="state" id=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-500 w-full form-control text-md">
                        <option value="" selected disabled>Seleccione el estado</option>
                        <option value="Dañado">Dañado</option>
                        <option value="Disponible">Disponible</option>
                        <option value="Vendido">Vendido</option>
                    </select>
                    <x-input-error for="state" class="mt-2" />

                    <div class="flex justify-end mt-4"> <x-button class="bg-gray-800 text-white py-2 px-4 rounded"
                            wire:click="save">Agregar</x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Lista de items -->
    <div class=" my-16">
        <div class="flex justify-center mt-6 items-start w-full max-w-[72%] mx-auto">
            <div class=" p-6 ">
                <h3 class="text-xl font-semibold">Lista de ítems</h3>
                <p class="text-gray-600">Aquí encontrará todos los ítems agregados</p>
            </div>

            <x-table-responsive>

                <div class="px-6 py-4">
                    <x-input type="text" wire:model.live="search" class="w-full"
                        placeholder="Ingrese el codigo de serie del item que quiere buscar" />
                </div>

                @if ($items->count())
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50 ">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-500 ">
                                    <div class="flex items-center gap-x-3">
                                        <span>Codigo</span>
                                    </div>
                                </th>

                                <th scope="col"
                                    class="px-12 py-3.5 text-md font-semibold text-left rtl:text-right text-gray-500 ">
                                    <span>Fecha de adquisicion</span>
                                </th>

                                <th scope="col"
                                    class="px-12 py-3.5 text-md font-semibold text-left rtl:text-right text-gray-500 ">
                                    <span>Fecha de expiración</span>
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-md font-semibold text-left rtl:text-right text-gray-500 ">
                                    <button class="flex items-center gap-x-2">
                                        <span>Estado</span>
                                    </button>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 ">
                            @foreach ($items as $item)
                                <tr>
                                    <td class="px-4 py-4 text-md font-medium text-gray-800 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <div>
                                                <h2 class="font-medium text-gray-800  ">{{ $item->code }}</h2>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="px-4 py-4 text-md text-gray-500 text-center whitespace-nowrap">
                                        {{ $item->purchase_date }}</td>

                                    <td class="px-4 py-4 text-md text-gray-500 text-center whitespace-nowrap">
                                        {{ $item->expiration_date }}</td>

                                    <td class="py-2 border-b">
                                        <div class="">
                                            @if ($item->state == 'Disponible')
                                                <div>
                                                    <a href="{{ route('supplements.edit-code', ['id' => $supplement, 'code' => $item->id]) }}"
                                                        class="px-3 py-2 mt-2 mb-2 text-md text-green-600 bg-green-100 rounded-full">
                                                        Disponible
                                                    </a>
                                                </div>
                                            @elseif ($item->state == 'Vendido')
                                                <div>
                                                    <a href="{{ route('supplements.edit-code', ['id' => $supplement, 'code' => $item->id]) }}"
                                                        class="px-3 py-2 mt-2 mb-2 text-md text-yellow-600 bg-yellow-100 rounded-full">
                                                        Vendido
                                                    </a>
                                                </div>
                                            @elseif ($item->state == 'Dañado')
                                                <div>
                                                    <a href="{{ route('supplements.edit-code', ['id' => $supplement, 'code' => $item->id]) }}"
                                                        class="px-3 py-2 mt-2 mb-2 text-md text-rose-600 bg-sky-100 rounded-full">
                                                        Dañado
                                                    </a>
                                                </div>
                                            
                                            @endif

                                        </div>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="px-6 py-4">
                        No hay ningun registro coincidente...
                    </div>
                @endif


               
            </x-table-responsive>
        </div>
    </div>
</div>
