<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">Empleados</h1>
                <a href="{{ route('login_register') }}"
                    class="inline-flex items-center px-4 py-2 bg-sky-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-800 focus:bg-sky-700 active:bg-sky-900 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Registrar empleado
                </a>
            </div>
            <section class="container px-4 mx-auto">
                <x-table-responsive>
                    <div class="px-6 py-4">
                        <x-input type="text" wire:model.live="search" class="w-full text-md"
                            placeholder="Ingrese el nombre del usuario que desea buscar" />
                    </div>
                    @if (count($employees))
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
                                        Turno
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Rol
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 ">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 ">
                                @foreach ($employees as $employee)
                                    <tr wire:key="{{$employee->user->email}}">
                                        <td class="px-4 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800 ">
                                                            {{ $employee->user->name }}
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            {{ $employee->user->email }}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $employee->user->phone }}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $employee->horary}}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                            @if(!empty($employee->user->getRoleNames()))
                                                @foreach ($employee->user->getRoleNames() as $role)
                                                    {{ $role }}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6 justify-center">
                                                <label>
                                                    <input @foreach ($employee->user->getRoleNames() as $role) {{ $role == 'admin' ? 'checked' : '' }} @endforeach value="1" type="radio" name="{{$employee->email}}" wire:change="assignRole({{$employee->id}}, $event.target.value)">
                                                    Admin
                                                </label>
                                                <label class="ml-2">
                                                    
                                                    <input @foreach ($employee->user->getRoleNames() as $role) {{ $role == 'recepcionista' ? 'checked' : '' }} @endforeach value="2" type="radio" name="{{$employee->email}}" wire:change="assignRole({{$employee->id}}, $event.target.value)">
                                                    Recepcionista
                                                </label>
                                                <label class="ml-2">
                                                    <input @foreach ($employee->user->getRoleNames() as $role) {{ $role == 'inhabilitar' ? 'checked' : '' }} @endforeach value="3" type="radio" name="{{$employee->email}}" wire:change="assignRole({{$employee->id}}, $event.target.value)">
                                                    Inhabilitar
                                                </label>
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