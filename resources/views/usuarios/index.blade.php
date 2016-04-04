<?php
echo link_to('cadastrar', $title = 'Clique para Cadastrar Usuário', $attributes = [], $secure = null);
?>

<table border='1'>
    <thead>
    <th>Nome</th>
    <th>Sobrenome</th>
    <th>E-mail</th>
    <th>Usuário</th>
    <th>Criado em</th>
    <th>Atualizado em</th>
    <th colspan="1">Ação</th> 
</thead>

    @foreach ($usuarios as $usuario)
<tbody>
    <tr>
        <td>{{$usuario->nome}}</td>
        <td>{{$usuario->sobrenome}}</td>
        <td>{{$usuario->email}}</td>
        <td>{{$usuario->usuario}}</td>
        <td>{{$usuario->created_at}}</td>
        <td>{{$usuario->updated_at}}</td>
        
        <!--É necessário uma rotas nomeada-->
        <td>{{link_to_route('usuarios.edit', $title = 'Editar', $usuario->id, $attributes = []) }}</td>
        
    </tr>
</tbody>
    @endforeach

</table>

