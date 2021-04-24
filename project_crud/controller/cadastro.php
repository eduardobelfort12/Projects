<?php

			if(isset($_POST['acao'])){
				//Enviou o formulário
				$usuario = $_POST['usuario'];
				$nome = $_POST['nome'];
				$password = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];
				//Verifica os campos
				if($usuario == ''){
					Painel::alert('erro','O login está vázio!');
				}else if($nome == ''){
					Painel::alert('erro','O nome está vázio!');
				}else if($password == ''){
					Painel::alert('erro','A senha está vázia!');
				}else if($cargo == ''){
					Painel::alert('erro','O cargo precisa estar selecionado!');
				}else if($imagem['name'] == ''){
					Painel::alert('erro','A imagem precisa estar selecionada!');
				}else{
					//Podemos cadastrar!
					if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro','O formato especificado não está correto!');
					}else if(Usuario::userExists($usuario)){
						Pasinel::alert('erro','Usuário existente!');
					}else{
						//Apenas realizar o cadastro no banco de dados!
						$user = new Usuario();
						$imagem = Painel::uploadFile($imagem);
						$user->cadastrarUsuario($nome,$usuario,$password,$imagem,$cargo);
						Painel::alert('sucesso','O cadastro do usuário foi feito com sucesso!');
						header('refresh:3;');

					}
				}
	
			}

?>