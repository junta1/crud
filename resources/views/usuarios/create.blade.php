<H3>Cadastro de Usuário</H3>

{{ Form::open(array('action' => 'UsuariosController@store','method' => 'post')) }}

    {{ Form::label('nome', 'Nome') }}
    {{ Form::text('nome') }}
    
    {{ Form::label('sobrenome', 'Sobrenome') }}
    {{ Form::text('sobrenome') }}
    
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email') }}
    
    {{ Form::label('usuario', 'Usuário') }}
    {{ Form::text('usuario') }}
    
    {{ Form::label('senha', 'Senha') }}
    {{ Form::password('senha') }}

    {{ Form::submit('Cadastrar') }}

{{ Form::close() }}

<?php
echo link_to('/', $title = 'Voltar', $attributes = [], $secure = null);
?>
