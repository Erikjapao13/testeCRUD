<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Necessário preencher o campo nome!</div>"];
}elseif(empty($dados['cpf'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Necessário preencher o campo cpf!</div>"];
}else{
    $query_usuario = "INSERT INTO usuarios (nome, cpf) VALUES (:nome, :cpf)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':nome', $dados['nome']);
    $cad_usuario->bindParam(':cpf', $dados['cpf']);

    $cad_usuario->execute();

    if($cad_usuario->rowCount()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' Erro: Usuário não cadastrado com sucesso!</div>"];
    }
}
echo json_encode($retorna);
?>