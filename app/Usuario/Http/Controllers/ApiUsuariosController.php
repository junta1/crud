<?php

namespace App\Usuario\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario\Model\UsuariosModel;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Usuario\Http\Requests\UsuarioValidacao;

class ApiUsuariosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    protected  $usuario;
    
    public function __construct(\App\Usuario\Usuario $usuario) {
        
        $this->usuario = $usuario;
    }


    public function index() {

        //Variavel que recebe o diretorio do model
//       $usuarios = \App\Models\UsuariosModel::all();
        $usuarios = $this->usuario->all();
        return response()->json($usuarios);
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
    public function store(UsuarioValidacao $validacao) {
//      

        $this->usuario->save($validacao->all());

        //Redireciona após a execuçã do inserir
        return redirect()->route('usuarios.index');
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

        $usuarios = $this->usuario->find($id);
        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, UsuarioValidacao $request) {

        $this->usuario->update($id, $request->all());

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        
        $this->usuario->delete($id);
        
        return redirect()->route('usuarios.index');
    }

}
