<?php

namespace App\Usuario\Model;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{   
    protected $table = 'usuarios';
    protected $fillable = ['nome','sobrenome','email','usuario','senha'];
}
