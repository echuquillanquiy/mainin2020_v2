<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $random = Str::random(8);
        return view('users.create', compact('random'));
    }

    public function ValidationStore(Request $request)
    {
        $rules =
        [
            'name' => 'required|min:15',
            'nickname' => 'required|min:8',
            'email' => 'required|unique:users|min:10',
            'role' => 'required',
            'dni' => 'min:8'
        ];

        $messages =
        [
            'name.required' => 'El nombre del usuario es requerido (Obligatorio).',
            'name.min' => 'El nombre del usuario debe tener mínimo 15 caracteres.',
            'nickname.required' => 'El nickname del usuario es requerido (Obligatorio).',
            'nickname.min' => 'El nombre de usuario debe tener como mínimo 8 caracteres.',
            'email.required' => 'El correo electronico es obligatorio.',
            'email.unique' => 'El email ya esta en uso.',
            'email.min' => 'El email debe tener como mínimo 10 caracteres',
            'role.required' => 'El rol es requerido.',
            'dni.min' => 'El DNI debe tener como mínimo 8 digitos.'
        ];
        $this->validate($request, $rules, $messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->ValidationStore($request);

        User::create(
            $request->only('name', 'email', 'nickname', 'dni', 'role')
            + [
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification = 'El usuario ha sido creado satisfactoriamente.';
        return redirect('/users')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function ValidationUpdate(Request $request)
    {
        $rules =
        [
            'name' => 'required|min:15',
            'nickname' => 'required|min:8',
            'email' => 'required|unique:users|min:10',
            'role' => 'required',
            'dni' => 'min:8'
        ];

        $messages =
        [
            'name.required' => 'El nombre del usuario es requerido (Obligatorio).',
            'name.min' => 'El nombre del usuario debe tener mínimo 15 caracteres.',
            'nickname.required' => 'El nickname del usuario es requerido (Obligatorio).',
            'nickname.min' => 'El nombre de usuario debe tener como mínimo 8 caracteres.',
            'email.required' => 'El correo electronico es obligatorio.',
            'email.unique' => 'El email ya esta en uso.',
            'email.min' => 'El email debe tener como mínimo 10 caracteres',
            'role.required' => 'El rol es requerido.',
            'dni.min' => 'El DNI debe tener como mínimo 8 digitos.'
        ];
        $this->validate($request, $rules, $messages);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->only('name', 'email', 'nickname', 'dni', 'role');
        $password = $request->input('password');
        if ($password) 
            $data ['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'La información del usuario se ha actualizado correctamente.';
        return redirect('/users')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userName = $user->name;
        $user->delete();

        $notification = "El usuario $userName se ha eliminado correctamente.";
        return redirect('/users')->with(compact('notification'));
    }
}
