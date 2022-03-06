<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Pesquisar</title>		
	</head>
	<body>
		<h1>Pesquisar Usuário</h1>
		<form method="POST" action="">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome"><br><br>
			
			<input name="SendPesqUser" type="submit" value="Pesquisado">
		</form><br><br>
		<?php


$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_UNSAFE_RAW);
if($SendPesqUser){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_UNSAFE_RAW);
    $result_usuario = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
    $resultado_usuario = mysqli_query($con, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				echo "ID: " . $row_usuario['id'] . "<br>";
				echo "Nome: " . $row_usuario['nome'] . "<br>";
				echo "CPF: " . $row_usuario['cpf'] . "<br>";
				echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
				echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
			}
		}
		?>
	</body>
</html>