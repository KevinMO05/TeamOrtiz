<div>
<div class=" my-10">
    <div class="flex justify-center items-center mt-6  w-full max-w-4xl mx-auto">
        <div class=" p-6 ">
            <h3 class="text-lg font-semibold mb-4">Maquina: <span
                    class="font-bold text-sky-500 bg-sky-300 bg-opacity-30 px-4 py-3 rounded-md">{{ $name}} - {{$code->code}}</span>
            </h3>
            <h3 class="text-lg font-semibold">Agregar codigo</h3>
            <p class="text-gray-600">En esta seccion podrá agregar nuevo codigo de la maquina introduciendo un
                número de serie.</p>
        </div>

        <div class="w-full ">
            <div class="bg-white shadow-md rounded-lg p-6">
                

                <x-label value="Fecha de ultimo mantenimiento" class="text-sm" />
                <x-input type="date" class="w-full form-control text-md md mb-3" wire:model.live="last_maintenance_date" />
                <x-input-error for="last_maintenance_date" class="mt-2" />

                <x-label value="Fecha de prox. mantenimiento" class="text-sm" />
                <x-input type="date" class="w-full form-control text-md md mb-3" wire:model.live="next_maintenance" />
                <x-input-error for="next_maintenance" class="mt-2" />


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
                                class="px-12 py-3.5 text-md font-semibold text-center  text-gray-500 ">
                                <span>Fecha de ultimo</span>
                            </th>
                            <th scope="col"
                                class="px-12 py-3.5 text-md font-semibold text-center  text-gray-500 ">
                                <span>Fecha de proximo</span>
                            </th>

                            

                            
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-4 py-4 text-md font-medium text-gray-800 whitespace-nowrap">
                                    <div class="inline-flex items-center gap-x-3">
                                        <div>
                                            <h2 class="font-medium text-gray-800  ">{{ $code->code }}</h2>
                                        </div>
                                    </div>
                                </td>


                                <td class="px-4 py-4 text-md text-gray-500 text-center whitespace-nowrap">
                                    {{ $item->last_maintenance_date }}</td>

                                    <td class="px-4 py-4 text-md text-gray-500 text-center whitespace-nowrap">
                                        {{ $item->next_maintenance }}</td>



                            
                                    
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
