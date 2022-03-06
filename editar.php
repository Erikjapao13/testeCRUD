<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['id'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Erro tente mais tarde!</div>"];
}elseif(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Necessário preencher o campo nome!</div>"];
}elseif(empty($dados['cpf'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Necessário preencher o campo cpf!</div>"];
}else{

    $query_usuario= "UPDATE usuarios SET nome=:nome, cpf=:cpf WHERE id=:id";

    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':nome', $dados['nome']);
    $edit_usuario->bindParam(':cpf', $dados['cpf']);
    $edit_usuario->bindParam(':id', $dados['id']);
    
    if($edit_usuario->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' Erro: Usuário não editado com sucesso!</div>"];
    }
}

echo json_encode($retorna);
?>