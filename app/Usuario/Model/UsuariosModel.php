<?php

namespace App\Usuario\Model;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{   
    protected $table = 'usuarios';
    protected $fillable = ['nome','sobrenome','email','usuario','senha'];
    
    
    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i:s', strtotime($value));
    }
    
    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y h:i:s', strtotime($value));
    }
    
}
