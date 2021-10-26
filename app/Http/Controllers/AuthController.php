<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash;

use App\Models\Usuario;

/**
 * -> Authentication functions (Sign in & Sign up) Controller
 */
class AuthController extends Controller
{
    /**
     * Main method, executed when controller is called through class
     */
    public function __invoke() {
        return view('auth.signin');// Calls the specified view
    }

    /**
     * Function to show the Sign Up interface
     */
    public function showSignUp() {
        return view('auth.signup');
    }

    /**
     * Method for save users register data
     */
    public function newSignUp(Request $request) {
        $formValidRules = [
            'num_empleado' => 'required | unique:App\Models\Usuario,numero_empleado',
            'puesto' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'dependencia' => 'required',
            'new_email' => 'required | email | unique:App\Models\Usuario,email',
            'new_password' => 'required',
            'repeat_password' => 'required | same:new_password'
        ];
        $validErrorMssgs = [
            'num_empleado.required' => "Debes colocar tu número de empleado",
            'num_empleado.unique' => "El número de empleado introducido ya se encuentra registrado",
            'puesto.required' => "Debes indicar tu puesto/cargo",
            'nombre.required' => "Debes colocar tu nombre",
            'apellidos.required' => "Debes colocar tus apellidos",
            'dependencia.required' => "Debes seleccionar de la lista la dependencia a la que perteneces",
            'new_email.required' => "Debes colocar tu correo institucional",
            'new_email.email' => "Por favor introduce una dirección de correo válida",
            'new_email.unique' => "El correo introducido ya se registró anteriormente",
            'new_password.required' => "Por favor coloca tu contraseña",
            'repeat_password.required' => "Introduce nuevamente tu contraseña",
            'repeat_password.same' => "Las contraseñas que colocaste son distintas una de la otra",
        ];

        // Declares the data form validator
        //$request->validate($formValidRules);
        $formValidator = Validator::make($request->all(), $formValidRules, $validErrorMssgs);
        if ($formValidator->fails()):
            $oldNum = $request->old('num_empleado');
            return back()->withErrors($formValidator)->with('message', "Error de llenado de datos:")->with('typealert', 'danger');
        else:
            $usuarioObj = new Usuario();
            $usuarioObj->numero_empleado = e($request->num_empleado);
            $usuarioObj->puesto = e($request->puesto);
            $usuarioObj->nombre = e($request->nombre);
            $usuarioObj->apellidos = e($request->apellidos);
            $usuarioObj->email = e($request->new_email);
            $usuarioObj->password = Hash::make($request->new_password);
            $usuarioObj->dependencia_id = $request->dependencia;

            // Store the new user register in the DB
            if ($usuarioObj->save()) {
                return redirect()->route('login')->with('message', "Tu usuario ha sido registrado, ahora inicia sesión.")
                    ->with('typealert', 'success');
            }
            else {
                return redirect()->route('register')->with('message', "Error en registro de Usuario. Favor de comunicarse con el administrador.")
                    ->with('typealert', 'danger');
            }
        endif;
    }
}
