<?php namespace App\Usuario;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author rafaelconceicao@conder.intranet
 */

use App\Usuario\Repositorio\UsuarioRepositorio;

class Usuario {
    
    
    protected $repositorio;


    public function __construct(UsuarioRepositorio $model)
    {
        $this->repositorio = $model;
    }


    public function save(array $input){
        
        $input['usuario'] = $this->tratarUsuario($input);
        
        return $this->repositorio->save($input);
        
    }
    
    public function update($id, array $input){
        
        $input['usuario'] = $this->tratarUsuario($input);
        
        return $this->repositorio->update($id, $input);
                
    }
    
    
    public function find($id){
        return $this->repositorio->find($id);
    }
    
    public function all(){
        
        return $this->repositorio->all();
        
    }
    
    protected function tratarUsuario($input)
    {
        if ($input['usuario'] == null) {
            $input['usuario'] = strtolower($input['nome']) . strtolower($input['sobrenome']);     
        }
        
        return $input['usuario'];
    }
    
    protected function delete($id)
    {
        return $this->repositorio->delete($id);
    }
}
