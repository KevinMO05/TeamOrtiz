<div>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </x-slot>

        <div class="mt-4 max-w-7xl flex justify-end">
            <x-button
                href="{{ route('register') }}"
                class="">
                Registrar un usuario
            </x-button>
        </div>

        <div class="container py-6">
            <div class="px-6 py-4 flex rounded-md bg-gradient-to-r from-sky-200 to-indigo-200">
                <x-input class="w-full" wire:model.live="search" type="text"
                    placeholder="Ingrese el nombre del usuario que desea buscar" />

            </div>
            <x-table-responsive>
                @if (count($employees))
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rol
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($employees as $employee)
                                <tr wire:key="{{$employee->email}}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-900">
                                            {{ $employee->name }}
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $employee->email }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $employee->phone }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">
                                        <div class="text-sm text-gray-900">

                                            @if(!empty($employee->getRoleNames()))
                                                @foreach ($employee->getRoleNames() as $role)
                                                    {{ $role }}
                                                @endforeach
                                            @endif

                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <label >
                                            <input  @foreach ($employee->getRoleNames() as $role)
                                                    {{ $role == 'admin' ? 'checked' : '' }}
                                                    @endforeach value="1" type="radio" name="{{$employee->email}}" wire:change="assignRole({{$employee->id}}, $event.target.value)">
                                            Admin
                                        </label>
                                        <label class="ml-2">
                                            <input  @foreach ($employee->getRoleNames() as $role)
                                                    {{ $role == 'recepcionsta' ? 'checked' : '' }}
                                                    @endforeach value="2" type="radio" name="{{$employee->email}}" wire:change="assignRole({{$employee->id}}, $event.target.value)">
                                            Recepcionista
                                        </label>
                                        <label class="ml-2">
                                            <input  @foreach ($employee->getRoleNames() as $role)
                                                    {{ $role == 'inhabilitar' ? 'checked' : '' }}
                                                    @endforeach value="3" type="radio" name="{{$employee->email}}" wire:change="assignRole({{$employee->id}}, $event.target.value)">
                                            Inhabilitar
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                @else
                    <div class="px-6 py-4 bg-gray-100 text-gray-500">
                        No hay ningun registro coincidente.

                    </div>
                @endif

                
            </x-table-responsive>
        </div>

    </div>

</div>