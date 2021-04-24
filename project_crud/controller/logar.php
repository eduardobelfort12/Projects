<?php
if (isset($_POST['usuario']) && $_POST['password']){
			//Enviou os dados de login e senha.
	$usuario  = $_POST['usuario'];
	$password = $_POST['password'];
	//Tudo certo podemos logar
	if(Usuario::Logar($usuario,$password)){ 	
		Painel::alert('sucesso','✓ - Login efetuado com sucesso!');
		header('refresh:2; '.INCLUDE_PATH_PAINEL);
		die();
	}else{
		Painel::alert('erro','X - Usuário ou senha incorretos!');
	}
}

?>	