<?php

class Usuario{

	//Verifica se o usuário é existente
	//Verify if user is exist
	public static function userExists($usuario){
		$sql = MySql::conectar()->prepare("SELECT `id` FROM `clientes` WHERE usuario=? ");
		$sql->execute(array($usuario));
		if($sql->rowCount() == 1)
			return true;
		else
			return false;
	}
	//Cadastra o usuário
	//Register data of user
	public static function cadastrarUsuario($nome,$usuario,$password,$imagem,$cargo){
		$sql = MySql::conectar()->prepare("INSERT INTO `clientes` VALUES (null,?,?,?,?,?)");
		$sql->execute(array($nome,$usuario,$password,$imagem,$cargo));
	}
	
	//atualiza os dados do usuário
	//updates the data of user
	public function atualizarUsuario($nome,$password,$imagem){
		$sql = MySql::conectar()->prepare("UPDATE `clientes` SET nome = ?,password = ?,img = ? WHERE usuario = ?");
		if($sql->execute(array($nome,$password,$imagem,$_SESSION['usuario']))){
			return true;
		}else{
			return false;
		}
	}
	//Altera o cargo do usuário individualmente
	//Alter level the access in the system of a user
		public function alteraCargo($cargo,$usuario){
		$sql = MySql::conectar()->prepare("UPDATE `clientes` SET cargo = ?WHERE usuario = ?");
		if($sql->execute(array($cargo,$usuario))){
			return true;
		}else{
			return false;
		}

	}
	//Função para realizar o login do usuário
	//Function for realize of login the user
	public function Logar($usuario,$password){
	$sql = Mysql::conectar()->prepare("SELECT * FROM `clientes` WHERE usuario = ? AND password = ?   ");
		$sql->execute(array($usuario,$password));
		if($sql->rowCount() == 1 ){
				$info = $sql->fetch();
				$_SESSION['login'] = true;
				$_SESSION['usuario'] = $usuario;
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['cargo'];
				$_SESSION['nome'] = $info['nome'];
				$_SESSION['img'] = $info['img'];
				return true;
		}else{
			return false;
		}
	
	}

}
	

?>