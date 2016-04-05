<?php namespace App\Usuario\Repositorio;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioRepositorio
 *
 * @author rafaelconceicao@conder.intranet
 */

use \App\Usuario\Model\UsuariosModel;

class UsuarioRepositorio {
    //put your code here
    
    protected $model;


    public function __construct(UsuariosModel $model)
    {
        $this->model = $model;
    }


    public function save(array $input){
     
        return $this->model->create($input);
        
    }
    
    public function update($id, array $input){
        $usuarios = $this->model->find($id);
        $usuarios->nome = $input['nome'];
        $usuarios->sobrenome = $input['sobrenome'];
        $usuarios->email = $input['email'];
        $usuarios->usuario = $input['usuario'];
        if (isset($input['senha'])) {
            
            $usuarios->senha = $input['senha'];
        }

        return $usuarios->save();
    }
    
    public function find($id){
        return $this->model->find($id);
    }
    
    public function all(){
        
        return $this->model->select('id', 'nome', 'sobrenome', 'usuario', 'email', 'created_at', 'updated_at')->get();
        
    }
    
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    
    
}
