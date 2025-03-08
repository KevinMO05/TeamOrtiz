<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg p-10">
            <h1 class="text-xl font-semibold">Cambiar plan de membresía</h1>

            <div class="w-full px-4 bg-red-400 mt-7 py-1 text-black font-semibold text-left rounded-t-lg">
                Membresia actual:

            </div>
            <div class="w-full px-4 bg-red-300  py-16 text-black font-bold text-3xl text-left ">
                Premium {{ $client->membership->membership_type }} 
            </div>
            <div class="w-full px-4 bg-stone-700  p-5 rounded-b-lg ">
                <div class="text-gray-100 font-semibold ml-3">
                    @if ($client->membership->membership_type == 'Mensual')
                        <ul>
                            <li>&#x2022; 1 membresia verificada</li>
                            <li>&#x2022; Cancela cuando quiera</li>
                        </ul>
                    @else
                        <ul>
                            <li>&#x2022; 1 membresia verificada</li>
                            <li>&#x2022; Cancela cuando quiera</li>
                            <li>&#x2022; Descuento en la compra de suplemento</li>
                        </ul>
                        
                    @endif
                </div>
                <div class="w-full flex justify-center">
                    <div class="bg-stone-400 w-[92%] h-0.5 my-5 rounded-lg "></div>
                </div>
            </div>

            <h2 class="text-xl font-semibold my-5">Membresias disponibles:</h2>

            <div class="w-full px-4 bg-gray-400  py-16 text-black font-bold text-3xl text-left rounded-t-lg">
                Premium {{ $client->membership->membership_type == 'Mensual' ? 'Anual' : 'Mensual' }}
            </div>
            <div class="w-full px-4 bg-stone-700  p-5 rounded-b-lg ">
                <div class="text-gray-100 font-semibold ml-3 flex flex-col ">
                    @if ($client->membership->membership_type == 'Anual')
                        <ul>
                            <li>&#x2022; 1 membresia verificada</li>
                            <li>&#x2022; Cancela cuando quiera</li>
                        </ul>
                    @else
                        <ul>
                            <li>&#x2022; 1 membresia verificada</li>
                            <li>&#x2022; Cancela cuando quiera</li>
                            <li>&#x2022; Descuento en la compra de suplemento</li>
                        </ul>
                        
                    @endif
                </div>
                <div class="w-full flex justify-center">
                    <div class="bg-stone-400 w-[92%] h-0.5 my-5 rounded-lg "></div>
                </div>
                <div class="flex justify-center w-[92%]"> 
                    <div class="border-2 border-stone-400 rounded-3xl px-3  py-2 ml-auto  {{($client->membership->membership_state == 'Activo') ? 'bg-gray-200 opacity-50 cursor-default' : ''}}">
                        <button href=" {{route('clients.renewal', $client->id)}}" class=" font-semibold {{($client->membership->membership_state == 'Activo') ? 'bg-gray-200 opacity-50 cursor-default text-black' : 'text-stone-100'}}" {{($client->membership->membership_state == 'Activo') ? 'disabled' : ''}} wire:click="change" >Seleccionar plan</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
