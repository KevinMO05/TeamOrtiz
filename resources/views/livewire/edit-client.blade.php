  <div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-xl font-semibold">Editar Cliente</h1>
                {{-- Nombre --}}
                <div class="my-4">
                    <x-label value="Nombre" class="text-sm" />
                    <x-input type="text" class="w-full form-control text-md"
                        placeholder="Ingrese el nombre completo del cliente" wire:model.live="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>
    
                <div class="my-4 grid grid-cols-2 gap-4">
                    <div class="colspan-1">
                        {{-- DNI --}}
                        <x-label value="Dni" class="text-sm" />
                        <x-input type="text" class="w-full form-control text-md" placeholder="Ingrese el dni del cliente"
                            wire:model.live="dni" />
                        <x-input-error for="dni" class="mt-2" />
                    </div>
                    <div class="colspan-1">
                        <x-label value="Telefono" class="text-sm" />
                        {{-- telefono --}}
                        <x-input type="text" class="w-full form-control text-md"
                            placeholder="Ingrese el numero de telefono del cliente" wire:model.live="phone" />
                        <x-input-error for="phone" class="mt-2" />
                    </div>
                </div>
                {{-- Email --}}
                <div class="my-4">
                    <x-label value="Email" class="text-sm" />
                    <x-input type="text" class="w-full form-control text-md"
                        placeholder="Ingrese el correo electronico del cliente" wire:model.live="email" />
                    <x-input-error for="email" class="mt-2" />
                </div>
                
                <div class="flex">
                    <x-button class="ml-auto font-normal bg-sky-900 mt-5 hover:bg-sky-700" wire:click="save" wire:loading.attr="disabled"
                        wire:target="save">
                        Editar cliente</x-button>
                </div>
    
                <div class="bg-gray-300 w-full h-1 my-10 rounded-lg"></div>
    
                
                <h1 class="text-xl font-semibold">Editar Membresia</h1>
                
                <div class="my-4 grid grid-cols-3 gap-4">
                   
                    <a class="colspan-1  p-3 rounded-md  m-3 text-white font-semibold text-center {{($client->membership->membership_state == 'Inactivo') ? 'bg-gray-500 opacity-50' : 'bg-rose-500 cursor-pointer hover:bg-rose-600 ' }}" {{($client->membership->membership_state == 'Inactivo') ? 'disabled' : '' }}wire:click="deleteMembership" >
                       Dar de baja
                    </a>
                    
                    
                    <a href={{route('clients.renewal', $client->id)}} class="colspan-1  bg-emerald-500 p-3 rounded-md cursor-pointer hover:bg-emerald-600 m-3 text-white font-semibold text-center">
                       Renovar membresia
                    </a>

                    <a class="colspan-1  bg-yellow-500 p-3 rounded-md cursor-pointer hover:bg-yellow-600 m-3 text-white font-semibold text-center">
                        Cambiar de plan
                     </a>
                </div>
    
                
                
                
            </div>
        </div>
    </div>
