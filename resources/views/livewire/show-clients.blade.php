<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">Clientes y Membresias</h1>
                <a href="{{ route('clients.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-sky-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-800 focus:bg-sky-700 active:bg-sky-900 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Agregar Cliente
                </a>
            </div>
            <section class="container px-4 mx-auto">

                <x-table-responsive>
                    <div class="px-6 py-4">
                        <x-input type="text" wire:model.live="search" class="w-full text-md"
                            placeholder="Ingrese el nombre del respuesto que quiere buscar" />
                    </div>

                    @if ($clients->count())
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        <div class="flex items-center gap-x-3">
                                            <span>Nombre</span>
                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        <span>Email</span>
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        <button class="flex items-center gap-x-2">
                                            <span>Telefono</span>
                                        </button>
                                    </th>



                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Tipo de membresia</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Fecha de inicio</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Fecha de fin</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Estado</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Acciones</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 ">
                                @foreach ($clients as $client)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">

                                                    <div>
                                                        <h2 class="font-medium text-gray-800  ">
                                                            {{ $client->user->name }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            {{ $client->user->email }}
                                        </td>


                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $client->user->phone }}</td>

                                        <td class="px-4 py-4 text-sm text-center text-gray-500  whitespace-nowrap">
                                            {{ $client->membership->membership_type }}</td>

                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ Carbon\Carbon::parse($client->membership->membership_start)->format('d-m-Y') }}
                                        </td>

                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ Carbon\Carbon::parse($client->membership->membership_end)->format('d-m-Y') }}
                                        </td>

                                        
                                            @if ($client->membership->membership_state == 'Activo')
                                                <td class="px-4 py-4 text-md font-medium text-gray-700 whitespace-nowrap">
                                                     <div
                                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 ">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                                        <h2 class="text-sm font-normal text-emerald-500">Activo</h2>
                                                     </div>
                                                 </td>
                                            @else
                                               <td class="px-4 py-4 text-md font-medium text-gray-700 whitespace-nowrap">
                                                <div
                                                    class="inline-flex items-center px-2 py-1 rounded-full gap-x-2 bg-rose-100/60 ">

                                                    <i class="fa-solid fa-xmark  text-rose-500"></i>
                                                    

                                                    <h2 class="text-sm font-normal text-rose-500">Inactivo</h2>
                                                </div>
                                            @endif
                                        
                               
            

                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">
                                        <a href="{{ route('clients.edit', $client->id) }}"
                                            class="text-yellow-500 transition-colors duration-200  hover:text-gray-500 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6
                                                    18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75
                                                    21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>

                                        <a href="{{route('clients.renewal', $client->id)}}"
                                            class="text-emerald-500 transition-colors duration-200 hover:text-gray-500 focus:outline-none">
                                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor"
                                                stroke="currentColor" stroke-width="0"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 10V8.125C9.93125 8.125 8.25 9.80625 8.25 11.875C8.25 12.5062 8.40625 13.1062 8.6875 13.625L7.775 14.5375C7.2875 13.7687 7 12.8562 7 11.875C7 9.1125 9.2375 6.875 12 6.875V5L14.5 7.5L12 10ZM15.3125 10.125L16.225 9.21251C16.7125 9.98126 17 10.8938 17 11.875C17 14.6375 14.7625 16.875 12 16.875V18.75L9.5 16.25L12 13.75V15.625C14.0687 15.625 15.75 13.9438 15.75 11.875C15.75 11.2438 15.5875 10.65 15.3125 10.125Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z" />
                                            </svg>
                                        </a>
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
            </section>
        </div>
    </div>
</div>
