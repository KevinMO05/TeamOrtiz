<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg p-10">
            <h1 class="text-xl font-semibold">Renovar Membresia</h1>
            <div class="my-4 grid grid-cols-2 gap-4">
                <div class="colspan-1">
                    <x-label value="Tipo de membresia" class="text-sm" />
                    <select name="type" disabled wire:model.live="membership_type" id=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-500 w-full form-control text-md bg-gray-200">
                        <option value="">Seleccione el tipo de membresia</option>
                        <option value="Mensual">Mensual</option>
                        <option value="Anual">Anual</option>
                    </select>
                    <x-input-error for="membership_type" class="mt-2" />
                </div>
                <div class="colspan-1">
                    <x-label value="Estado de membresía" class="text-sm" />
                    <select name="state" {{ ($membership_state == 'Activo') ? 'disabled' : ''}} wire:model="membership_state" id=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-500 w-full form-control text-md">
                        <option value="">Seleccione el estado de membresia</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    <x-input-error for="membership_state" class="mt-2" />
                </div>
            </div>

            <div class="my-4 grid grid-cols-2 gap-4">
                <div class="colspan-2">
                    {{-- DNI --}}
                    <x-label value="Fecha de inicio" class="text-sm" />
                    <input type="date" class="w-full form-control text-md text-gray-500 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Ingrese la fecha de inicio de la membresía"
                        wire:model.live="membership_start"
                        {{ $membership_state == 'Activo' ? 'disabled' : '' }} />
                    <x-input-error for="membership_start" class="mt-2" />
                </div>
                
            </div>
            <div class="flex">
                <x-button   class="ml-auto font-normal bg-sky-900 mt-5 hover:bg-sky-700" wire:click="renewal" wire:loading.attr="disabled"
                    wire:target="renewal">
                    Renovar membresía</x-button>
            </div>
            
        </div>
    </div>
</div>
