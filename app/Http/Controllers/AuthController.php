<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth;

use App\Models\Usuario;
use App\Models\RolUsuario;
use App\Models\Dependencia;

/**
 * -> Authentication functions (Sign in & Sign up) Controller
 */
class AuthController extends Controller
{
    public function __construct()
    {
        // Using middleware, restrict the methods access if the user is not authenticated
        $this->middleware('guest')->except(['doLogout']);
    }
    
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
        // Code for bring the 'Dependencias' registers and put it on select input
        $dependenciesItems = Dependencia::pluck('nombre', 'id');

        return view('auth.signup', compact('dependenciesItems'));
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
            return back()->withErrors($formValidator)->with('message', "Error de llenado de datos:")->with('typealert', 'danger');
        else:
            // Validates if the new user email is or not an institutional mail
            if (!str_contains(e($request->new_email), "tulancingo.gob.mx"))
                return back()->with('message', "Es necesario usar el correo institucional para registrarse.")->with('typealert', 'danger');

            // Enter to the save register process...
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
                // Makes a new register to associate the new user with a corresponding role
                $rolUsuarioObj = new RolUsuario();
                $newUserId = Usuario::select('id')->where('email', e($request->new_email))->first();// Eloquent query to get the new user id
                $newUserId = $newUserId['id'];// Obtains the value from the object returned in query
                if (strtolower(e($request->puesto)) == 'secretario' || strtolower(e($request->puesto)) == 'secretaria') {
                    $rolUsuarioObj->rol_id = 2;
                    $rolUsuarioObj->usuario_id = $newUserId;
                    if (!$rolUsuarioObj->save())
                        return redirect()->route('register')->with('message', "Error al registrar Rol en el sistema. Favor de comunicarse con el administrador.")->with('typealert', 'danger');
                }
                else {
                    $rolUsuarioObj->rol_id = 3;
                    $rolUsuarioObj->usuario_id = $newUserId;
                    if (!$rolUsuarioObj->save())
                        return redirect()->route('register')->with('message', "Error al registrar Rol en el sistema. Favor de comunicarse con el administrador.")->with('typealert', 'danger');
                }

                // Everything good, return login page !
                return redirect()->route('login')->with('message', "Tu usuario ha sido registrado, ahora inicia sesión.")->with('typealert', 'success');
            }
            else {
                return redirect()->route('register')->with('message', "Error en registro de Usuario. Favor de comunicarse con el administrador.")
                    ->with('typealert', 'danger');
            }
        endif;
    }

    /**
     * Login/Sign in & logout functions methods (both)
     */
    public function doSignIn(Request $loginRequest){
        // Form validation parameters
        $formValidRules = [
            'email' => 'required | email',
            'password' => 'required',
        ];
        $validErrorMssgs = [
            'email.required' => "Debes colocar tu correo institucional",
            'email.email' => "Por favor introduce una dirección de correo válida",
            'password.required' => "Tu contraseña es necesaria para iniciar sesión",
        ];

        // Declares the data form validator
        $formValidator = Validator::make($loginRequest->all(), $formValidRules, $validErrorMssgs);
        if ($formValidator->fails()):
            return back()->withErrors($formValidator)->with('message', "Credenciales de inicio faltantes:")->with('typealert', 'danger');
        else:
            if (Auth::attempt(['email' => e($loginRequest->email), 'password' => e($loginRequest->password)], true)){// 'true' parameter allows a durable ("long-time") user connection
                // Code to redirect users based on their roles
                $userId = Usuario::select('id')->where('email', e($loginRequest->email))->first();// Obtains the registered user ID from DB
                $userId = $userId['id'];
                $userRole = RolUsuario::select('rol_id')->where('usuario_id', $userId)->first();// Make an Eloquent query to get the user role
                $userRole = $userRole['rol_id'];

                // Redirection based on type of role
                if ($userRole == '1')
                    return redirect('admin');
                elseif ($userRole == '2')
                    return redirect('secretary');
                elseif ($userRole == '3')
                    return redirect('operating');
                else 
                    return redirect('/');
            }
            else {
                return back()->with('message', "Tu correo o contraseña son incorrectos")->with('typealert', 'danger');
            }
        endif;
    }
    /**
     * Logout / sign out method
     */
    public function doLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
