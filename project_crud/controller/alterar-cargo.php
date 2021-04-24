<?php
if(isset($_POST['acao'])){
	
	$usuario = $_POST['usuario'];
	$cargo = $_POST['cargo'];

	if($usuario == ''){
		Painel::alert('erro','Campo login vazio!');
	}else{
		if(Usuario::userExists($usuario) == true){

			$user = new Usuario();
			$user->alteraCargo($cargo,$usuario);
			Painel::alert3('sucesso','Cargo alterado com sucesso!');
			header('refresh:2;');
		}else{
			echo "<script>alert('Falha ao alterar o cargo!');</script>";
		}
	}
}
?>