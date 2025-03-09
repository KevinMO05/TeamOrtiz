<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">Maquinas</h1>
                <a href="{{ route('machines.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-sky-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-800 focus:bg-sky-700 active:bg-sky-900 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Agregar maquina
                </a>
            </div>
            <section class="container px-4 mx-auto">

                <x-table-responsive>
                    <div class="px-6 py-4">
                        <x-input type="text" wire:model.live="search" class="w-full text-md"
                            placeholder="Ingrese el nombre del respuesto que quiere buscar" />
                    </div>

                    @if ($machines->count())
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
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Acciones</th>

                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 ">
                                @foreach ($machines as $machine)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">

                                                    <div>
                                                        <h2 class="font-medium text-gray-800  ">
                                                            {{ $machine->name }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        

                                        <td class="px-4 py-4 text-sm whitespace-nowrap ">
                                            <div class="flex items-center justify-center gap-x-6">
                                                <a href="{{route('machines.edit', $machine)}}"
                                                    class="text-yellow-500 transition-colors duration-200  hover:text-gray-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-7 h-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6
                                                                18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75
                                                                21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                                <a href="{{route('machines.add-code', $machine)}}"
                                                    class="text-emerald-500 transition-colors duration-200   hover:text-gray-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 128 128" stroke-width="4" stroke="currentColor"
                                                        class="w-7 h-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M 64 6.0507812 C 49.15 6.0507812 34.3 11.7 23 23 C 0.4 45.6 0.4
                                                    82.4 23 105 C 34.3 116.3 49.2 122 64 122 C 78.8 122 93.7 116.3 105 105
                                                    C 127.6 82.4 127.6 45.6 105 23 C 93.7 11.7 78.85 6.0507812 64 6.0507812
                                                    z M 64 12 C 77.3 12 90.600781 17.099219 100.80078 27.199219 C 121.00078
                                                    47.499219 121.00078 80.500781 100.80078 100.80078 C 80.500781 121.10078
                                                    47.500781 121.10078 27.300781 100.80078 C 7.0007813 80.500781 6.9992188
                                                    47.499219 27.199219 27.199219 C 37.399219 17.099219 50.7 12 64 12 z M 64
                                                    42 C 62.3 42 61 43.3 61 45 L 61 61 L 45 61 C 43.3 61 42 62.3 42 64 C 42
                                                    65.7 43.3 67 45 67 L 61 67 L 61 83 C 61 84.7 62.3 86 64 86 C 65.7 86 67
                                                    84.7 67 83 L 67 67 L 83 67 C 84.7 67 86 65.7 86 64 C 86 62.3 84.7 61 83
                                                    61 L 67 61 L 67 45 C 67 43.3 65.7 42 64 42 z">
                                                        </path>
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
