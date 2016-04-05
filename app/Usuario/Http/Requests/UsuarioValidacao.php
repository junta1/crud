<?php

namespace App\Usuario\Http\Requests;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use \App\Http\Requests\Request;

class UsuarioValidacao extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $nameId = 'id';

    public function authorize() {
        return true;
    }

    public function rules() {

        if ($this->getByid()) {

            return $this->validacaoModoEdicao();
        };

        return $this->validacaoModoCriacao();
    }

    public function messages() {

        return [
            'nome.required' => 'Campo nome obrigatório',
            'sobrenome.required' => 'Campo sobrenome obrigatório',
            'email.required' => 'Campo e-mail obrigatório',
            'usuario.required' => 'Campo usuario obrigatório',
            'senha.required' => 'Campo senha obrigatório'
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'email' => "required|unique:usuarios,email,{$id}|max:255|email",
            'usuario' => "unique:usuarios,usuario,{$id}|max:20'"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'email' => 'required|unique:usuarios|max:255|email',
            'usuario' => 'unique:usuarios|max:20',
            'senha' => 'required|max:32',
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }

}
