<?php
 require_once('../config.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo INCLUDE_PATH ?>css/style.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Arial' rel='stylesheet'>
</head>
<body>	
	<header>
		<nav>
			<ul>
				<li><a href="<?php echo INCLUDE_PATH; ?>tela-cadastro">Cadastre-se</a></li>
			</ul>
		</nav>
	</header>
	<div class="position-alert-login"><?php require_once('../../controller/logar.php'); ?></div>
	<div class="container box ">	
		<form method="post" enctype="multipart/form-data">
			<input class="quebrarlinha" type="text" name="usuario" placeholder="Digite seu login" required />
			<input class="quebrarlinha" type="password" name="password" placeholder="Digite sua senha" required/>
			<input class="quebrarlinha" type="submit" name="acao" value="LOGAR!"/>
		</form>
	</div>
</body>
</html>