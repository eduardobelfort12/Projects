<?php

session_start();
 
//Este pequeno trecho faz a chamada dinamicamente das classes especificamente usada para os arquivos que estão dentro da pasta painel, buscarem as classes na pasta model na estrutura mvc//
// This short excerpt dynamically calls the classes used for the files that are inside the panel folder, search as classes in the model folder in the mvc structure //
$autoload = function ($class){
	include('model/'.$class.'.php');
};
spl_autoload_register($autoload);

define('INCLUDE_PATH','http://localhost/project_crud/view/');
define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

define('BASE_DIR_PAINEL',__DIR__.'/painel/');

//conectar com banco de dadoss//

//Connect Database//
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','crud');

//esta função executa a busca do índice de acesso de nível do usuário para verificar se o usuário está em um dos níveis de acesso permitidos para acessar o painel principal

//this function execute the search the index of level acces the user for verifying if the user is in one from the levels accesses permitied for to access the panel main

function pegaCargo($indice){
	return Painel::$cargos[$indice];
	}

//verifica se o nivel de acesso do usuario, para liberar as funções no painel principal, de acordo com o nivel de acesso do usuário

//checks if the user's access level, to release the functions on the main panel, according to the user's access level 
function verificaPermissaoMenu($permissao){
	if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

// verifica se o nivel de acesso do usuário é permitido

//Verify if level the access of user is permited 	
function verificaPermissaoPagina($permissao){
	if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}


 ?>