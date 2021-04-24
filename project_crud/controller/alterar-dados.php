		<?php
			if(isset($_POST['acao'])){
				//Enviou o formulário.
				$nome = $_POST['nome'];
				$password = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				$user = new Usuario();
				if($imagem['name'] != ''){

					//Verifica se existe upload de imagem 
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						if($user->atualizarUsuario($nome,$password,$imagem)){
							$_SESSION['img'] = $imagem;
							Painel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
						}
					}else{
						Painel::alert('erro','O formato da imagem não é válido');
					}
				}else{
					$imagem = $imagem_atual;
					//Tudo certo Cadastrar o usuário
					if($user->atualizarUsuario($nome,$password,$imagem)){
						Painel::alert('sucesso','Atualizado com sucesso!');
						header('refresh:2;');
					}else{
						Painel::alert('erro','Ocorreu um erro ao atualizar...');
					}
				}

			}
		?>