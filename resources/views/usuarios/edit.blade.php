<H3>Edição de Usuário</H3>

{{--Identificando os erros na tela--}}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{--{{ Form::open(['action' => ['UsuariosController@edit', $usuarios->id],'method' => 'PUT']) }}--}}
{{--{{ Form::model($usuarios, array('route' => array('usuarios.edit', $usuarios->id), 'method' => 'PUT')) }}--}}
{{--{{ Form::model($usuarios, ['method' => 'PATCH', 'action' => ['UsuariosController@update', $usuarios->id]]) }}--}}

{{ Form::model($usuarios,['method' => 'PATCH','route'=>['usuarios.update',$usuarios->id]]) }}
    {{ Form::label('nome', 'Nome') }}
    {{ Form::text('nome') }}
    {{--{{ $errors->first('nome','##Campo Nome Obrigatorio##') }}--}}
    
    {{ Form::label('sobrenome', 'Sobrenome') }}
    {{ Form::text('sobrenome') }}
    
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email') }}
    
    {{ Form::label('usuario', 'Usuário') }}
    {{ Form::text('usuario') }}
    
    {{ Form::label('senha', 'Senha') }}
    {{ Form::password('senha') }}

    {{ Form::submit('Atualizar') }}

{{ Form::close() }}


{{ Form::open(['method' => 'DELETE','route'=>['usuarios.destroy',$usuarios->id]]) }}

    {{ Form::submit('Excluir') }}

{{ Form::close() }}

<?php
echo link_to('/', $title = 'Voltar', $attributes = [], $secure = null);
?>