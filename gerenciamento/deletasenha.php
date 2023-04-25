<?php
session_start();
include_once("../conexoes/conecti.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM usuarios WHERE id_senha='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Usuário apagado com sucesso</h2>";
		header("Location: senhas.php");
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o usuário não foi apagado com sucesso</h2>";
		header("Location: senhas.php");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um usuário</h2>";
	header("Location: senhas.php");
}
