<x-guest-layout>
    <x-authentication-card>
        
        <x-slot name="logo">
            <img src="{{ asset('img/best_gym.svg') }}" alt="" width="600px">
        </x-slot>
        <h2 class=" text-5xl  font-bold text-blue-950 mb-6 mt-5 ">Registrar Usuario</h2>


        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('register_login') }}" class="col-span-2 grid grid-cols-2 gap-5">
            @csrf

            <!-- Campo Name -->
            <div class="col-span-1">
                <x-label for="name" value="{{ __('Nombre completo') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>

            <!-- Campo DNI -->
            <div class="col-span-1">
                <x-label for="dni" value="{{ __('DNI') }}" />
                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')"
                    required />
            </div>

            <!-- Campo Email -->
            <div class="col-span-1">
                <x-label for="email" value="{{ __('Correo electronico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <!-- Campo Teléfono -->
            <div class="col-span-1">
                <x-label for="phone" value="{{ __('Telefono') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')"
                    required />
            </div>

          
            <!-- Campo Password -->
            <div class="col-span-1">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                
                <!-- Barra de progreso de contraseña -->
                <div id="password-strength-container" class="w-full h-2 mt-1 bg-gray-200 rounded-full">
                    <div id="password-strength-bar" class="h-full w-0 bg-gray-300 rounded-full"></div>
                </div>

                <div id="password-strength-message" class="text-xs mt-1"></div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var passwordField = document.getElementById('password');
                    var strengthMessage = document.getElementById('password-strength-message');
                    var strengthBar = document.getElementById('password-strength-bar');
    
                    passwordField.addEventListener('input', function() {
                        var result = zxcvbn(passwordField.value);
                        var score = result.score; // Puntuación de 0 (muy débil) a 4 (muy fuerte)
    
                        var message = '';
                        var barWidth = 0;
                        var barClass = '';

                        switch (score) {
                            case 0:
                            case 1:
                                message = 'Contraseña muy débil';
                                barWidth = '25%';
                                barClass = 'bg-red-500';
                                strengthMessage.style.color = 'red';
                                break;
                            case 2:
                                message = 'Contraseña media';
                                barWidth = '50%';
                                barClass = 'bg-yellow-500';
                                strengthMessage.style.color = 'orange';
                                break;
                            case 3:
                            case 4:
                                message = 'Contraseña fuerte';
                                barWidth = '100%';
                                barClass = 'bg-green-500';
                                strengthMessage.style.color = 'green';
                                break;
                        }
    
                        strengthBar.style.width = barWidth;
                        strengthBar.className = `h-full rounded-full ${barClass}`;
                        strengthMessage.textContent = message;
                    });
                });
            </script>

            <!-- Campo Confirm Password -->
            <div class="col-span-1">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Términos y condiciones (opcional) -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="col-span-2">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ml-2">
                                {!! __('Acepto los :Terminos de Servicio y :Politicas de Privacidad', [
                                    'Terminos de Servicio' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 ">' .
                                        __('Términos de Servicio') .
                                        '</a>',
                                    'Politicas de Privacidad' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 ">' .
                                        __('Políticas de Privacidad') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Botón y enlace -->
            <div class="col-span-2 flex justify-between items-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>

        <x-slot name="account">
        </x-slot>
    </x-authentication-card>
</x-guest-layout>
