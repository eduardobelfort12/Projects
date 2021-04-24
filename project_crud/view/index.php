<?php
 require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro no banco</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo INCLUDE_PATH?>css/style.css" rel="stylesheet" />
	<link href='https://fonts.googleapis.com/css?family=Arial' rel='stylesheet'>
</head>
<body style="font-family: 'Arial';">
	<header>
		<nav>
		<ul>
			<li><a href="<?php echo INCLUDE_PATH_PAINEL; ?>tela-login">Login</a></li>
		</ul>
	</nav>
	</header>
<div class="position-alert-cadastro"><?php  require_once('../controller/cadastro.php');?></div>
<div class="container box ">
<form  method="post" enctype="multipart/form-data">
	<input class="quebrarlinha" type="text" name="nome" placeholder="Digite seu nome" required  >
	<input class="quebrarlinha" type="text" placeholder="Digite um nome de usuário" name="usuario" required >
	<input class="quebrarlinha" type="password" placeholder="crie uma senha" name="password" required>
	<label >Cadastrar como:</label>
		<select name="cargo">
			<!-- Este trecho salva a opção seleciona no banco de dados para cadastrar! -->
				<?php
					foreach (Painel::$cargos as $key => $value) {
						if($key == 0 || $key == 1 || $key == 2) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
	<label></label>			
	<input class="quebrarlinha" id="files" type="file" name="imagem"/>	
		<div class="imagem-usuario">
				<img id="image" src="images/sem-foto.png" />
			</div><!--avatar-usuario-->
				
			<!--avatar-usuario-->
	<input class="quebrarlinha" type="submit" name="acao" value="Cadastrar" >
</form>
</div>
<script>
	document.getElementById("files").onchange = function () {
    let reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
</body>
</html>
<!--BY - EDUARDO BELFORT -->