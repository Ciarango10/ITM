<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $request){

        $filter = $request->filter;

        if(!empty($request->records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env('PAGINATION_MAX_SIZE')
                                                                    ? $request->records_per_page
                                                                    :  env('PAGINATION_MAX_SIZE');
        } else {

            $request->records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $users = User::with('role')
                     ->where('first_name', 'LIKE', "%$filter%")
                     ->orWhere('last_name', 'LIKE', "%$filter%")
                     ->orWhere('document', 'LIKE', "%$filter%")
                     ->orWhere('email', 'LIKE', "%$filter%")
                     ->paginate($request->records_per_page);

        return view('users.index', ['users' => $users,
                                    'data' => $request]);
    }

    public function create() {

        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    public function edit($id) {

        $user = User::find($id);

        if (empty($user)) {

            Session::flash('message', ['content' => "El usuario con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        $roles = Role::all();
        return view('users.edit', ['user' => $user,
                                   'roles' => $roles]);
    }

    public function store(Request $request) {

        Validator::make($request->all(), [

            'first_name' => 'required',
            'last_name' => 'required',
            'document' => 'required',
            'email' => 'required|email',
            'role_id' => 'required|exists:roles,id',
        ],
        [
            'first_name.required' => 'Los nombres son requeridos.',
            'last_name.required' => 'Los apellidos son requeridos.',
            'document.required' => 'El documento es requerido.',
            'email.required' => 'El Correo es requerido.',
            'email.email' => 'El Correo debe ser un campo válido.',
            'role_id.required' => 'El rol es requerido.',
            'role_id.exists' => 'El id dado para el rol no existe.',
        ])->validate();

        try {

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->document = $request->document;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->password = Hash::make($request->document);
            $user->role_id = $request->role_id;

            $user->save();

            Session::flash('message', ['content' => 'Usuario creado con éxito', 'type' => 'success']);
            return redirect()->action([UsersController::class, 'index']);

        } catch(Exception $ex){

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function update(Request $request) {

        Validator::make($request->all(), [

            'user_id' => 'required|exists:users,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'document' => 'required',
            'role_id' => 'required|exists:roles,id',
        ],
        [
            'user_id.required' => 'El usuario es requerido.',
            'user_id.exists' => 'El id dado para el usuario no existe.',
            'first_name.required' => 'Los nombres son requeridos.',
            'last_name.required' => 'Los apellidos son requeridos.',
            'document.required' => 'El documento es requerido.',
            'role_id.required' => 'El rol es requerido.',
            'role_id.exists' => 'El id dado para el rol no existe.',
        ])->validate();

        try {

            $user = User::find($request->user_id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->document = $request->document;
            $user->role_id = $request->role_id;

            $user->save();

            Session::flash('message', ['content' => 'Usuario creado con éxito', 'type' => 'success']);
            return redirect()->action([UsersController::class, 'index']);

        } catch(Exception $ex){

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }
}
