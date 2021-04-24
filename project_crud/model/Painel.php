<?php
//Initiate Class Painel in the system
class Painel{
	//Variável níveis de acesso do sistema 
	//Variables of levels the access in the system
	public static $cargos = [
		'0' => 'Usuário-Normal',
		'1' => 'Sub Administrador',
		'2' => 'Administrador'];
	//Verifica se o usuário está logado
	//Check if the user is logged
		public static function logado(){
			return isset($_SESSION['login'])? true : false;
		}
	//Faz o logout do usuário
	//Does the loggout of user in the system
		public static function loggout(){
			session_destroy();
			header('Location: '.INCLUDE_PATH_PAINEL);
		}
		//Box de alerta para funções de editar usário,cadastrar usuario e tambem para função de login
		//Box of alert for functions of edit user and register user  or also for function of login
		public static function alert($tipo,$mensagem){
			if($tipo == 'sucesso'){
				echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';

			}


		}
		//box de alerta especifica a função de busca dos usuários
		//box of alert specified the function search of users
		public static function alert2($tipo,$mensagem){
			if($tipo == 'sucesso'){
				
				echo '<div class="box-alert2 sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert2 erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';

			}


		}
		//box de alerta específico da função alterar cargo 
		//box of alert specified the function alter-cargo  
			public static function alerts3($tipo,$mensagem){
			if($tipo == 'sucesso'){
				echo '
				<div class="mask"></div>
				<div id="delbox" class="box-alert3 sucesso "><i class="fa fa-check"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert3 erro mask"><i class="fa fa-times"></i> '.$mensagem.'</div>';

			}


		}

		//Carrega o conteúdo dinamicamente no painel principal do sistema
		//Load content dinamically at main panel in the system
		public static function carregarPagina(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');
				}else{
					//Página não existe!
					header('Location: '.INCLUDE_PATH_PAINEL);
				}
			}else{
				include('pages/home.php');
			}
		}
		public static function imagemValida($imagem){
			if($imagem['type'] == 'image/jpeg' ||
				$imagem['type'] == 'imagem/jpg' ||
				$imagem['type'] == 'image/png'){

				$tamanho = intval($imagem['size']/1024);
			if($tamanho < 300)
				return true;
			else
				return false;
		}else{
			return false;
		}
	}
	//Função para realizar o upload de imagens dos usuarios
	//Function for realize upload of img the users//
		public static function uploadFile($file){
			$formatoArquivo = explode('.',$file['name']);
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'uploads/'.$imagemNome))
				return $imagemNome;
			else
				return false;
		}

	public static function deleteFile($file){
		@unlink('uploads/'.$file);

	}
	//Verifica a existência do ID do usuário
	//Verifying if exists the id specified user at in form the searching
	public static function idExist($id){
		$sql = MySql::conectar()->prepare("SELECT `id` FROM `clientes` WHERE id=? ");
		$sql->execute(array($id));
		if($sql->rowCount() == 1)
			return true;
		else
			return false;
	}
		//Busca os usuários na base de dados
		//Search the users at database throught the ID
	public static function selectAll($tabela){
		$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ");
		$sql->execute();
		return $sql->fetchAll();

	}

	//Deleta o usuário desejado
	//Delete user specified in the system
	public static function deletar($tabela,$id=false){
		if($id  == false){
			$sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
		}else{
			$sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
		}
		$sql->execute();
	}
		//Exibe na tela os dados do usuário
		//Displays at screen the data of users
	public static function mostrar($id){
		$sql = MySql::conectar()->prepare("SELECT * FROM `clientes` WHERE id = ? ");
		$sql->execute(array($id));
		return $sql->fetchAll();

	}
	//Função para alterar os dados do usuario
	//Function for alters the data of users
		public static function alterDados($id){
		$sql = MySql::conectar()->prepare("SELECT * FROM `clientes` WHERE id = ? ");
		$sql->execute(array($id));
		return $sql->fetchAll();

	}
	

}
?>