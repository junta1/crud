<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuariosModel;
use Illuminate\Support\Facades\Input;

class UsuariosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        //Variavel que recebe o diretorio do model
//       $usuarios = \App\Models\UsuariosModel::all();
        $usuarios = UsuariosModel::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
//        \App\Models\UsuariosModel::create([ 
        //Validando campos
        $this->validate($request, [
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'email' => 'required|unique:usuarios|max:255|email',
            'usuario' => 'required|unique:usuarios|max:20',
            'senha' => 'required|max:32',
        ]);

        UsuariosModel::create([
            'nome' => $request['nome'],
            'sobrenome' => $request['sobrenome'],
            'email' => $request['email'],
            'usuario' => $request['senha'],
            'senha' => md5($request['senha']),
        ]);

        //Redireciona após a execuçã do inserir
        return redirect()->action('UsuariosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
//        $usuario = UsuariosModel::find($id);
//        return view('usuario.edit',['usuario'=>$usuario]);

        $usuarios = UsuariosModel::find($id);
        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request) {
        
        $rules = [
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'email' => "required|unique:usuarios,email,{$id}|max:255|email",
            'usuario' => "required|unique:usuarios,usuario,{$id}|max:20'"
        ];
            
            $message = [
                'required' => 'Campo obrigatório'
            ];
        
        $this->validate($request,$rules, $message);
         
        $usuarios = UsuariosModel::find($id);
        $usuarios->nome = Input::get('nome');
        $usuarios->sobrenome = Input::get('sobrenome');
        $usuarios->email = Input::get('email');
        $usuarios->usuario = Input::get('usuario');
        if(Input::get('senha') != null) {
            $usuarios->senha = Input::get('senha');    
        }
        
        $usuarios->save();

        return redirect()->action('UsuariosController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $usuarios = UsuariosModel::destroy($id);
        return redirect()->action('UsuariosController@index');
    }

}
