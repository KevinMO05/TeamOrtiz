<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'dni' => 'required|string|max:8',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric|digits:9',
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',
            ],
        ]);

        // Comprobar si la validación falla
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        // Intentar crear o actualizar el usuario
        try {
            // Si no existe, crear un nuevo usuario con validación de unicidad del DNI
            $validator = Validator::make($request->all(), [
                'dni' => 'unique:users,dni'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()], 422);

            }

            // Validación de unicidad del correo
            $validator = Validator::make($request->all(), [
                'email' => 'unique:users,email'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()], 422);

                
            }

            // Crear un nuevo usuario
            $usuario = User::create([
                'name' => $request->name,
                'dni' => $request->dni,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password), // Encriptar la contraseña

            ]);

            return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
        } catch (QueryException $e) {
            return redirect()->route('register')->with('error', 'Error al registrar el usuario. Intenta nuevamente.');
        }
    }
}
