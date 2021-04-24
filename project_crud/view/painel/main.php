
<?php
if(isset($_GET['loggout'])){
	Painel::loggout();
}
?>

<?php
	
if (!isset($_SESSION['cargo']) && $_SESSION['login']){
	echo'<script>alert("Acesso negado!");</script>';
	header('location:painel/tela-login');

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro no banco</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
	<link href='https://fonts.googleapis.com/css?family=Arial' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


	<div id="menu-sidenav" class="menu sidenav">
		<div  class="menu-wraper">
			<div class="box-usuario">
				<?php
				if($_SESSION['img'] == ''){
					?>
					<div class="avatar-usuario">
						<i class="fa fa-user"></i>
					</div><!--avatar-usuario-->
				<?php }else{ ?>
					<div class="imagem-usuario">
						<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
					</div><!--avatar-usuario-->
				<?php } ?>
				<div class="nome-usuario">
					
					<p><?php echo $_SESSION['nome'];?></p>
					<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
					
				</div><!--nome-usuario-->
			</div><!--box-usuario-->
			<div class="items-menu">
				<h2>Menu</h2>
				<a  href="<?php echo INCLUDE_PATH_PAINEL ?>
				editar-usuario">Editar Usuário</a>
				<a <?php verificaPermissaoMenu(1,2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
				<a <?php verificaPermissaoMenu(2); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>listar-usuario">Listar usuário</a>
				<a <?php verificaPermissaoMenu(2);?>  href="<?php echo INCLUDE_PATH_PAINEL ?>buscar-usuario">Pesquisar Usuário</a>
				
			</div><!--items-menu-->
		</div><!--menu-wraper-->
	</div><!--menu-->

	<header id="menu-header">
		<div class="center">
			<div id="sidenav-menu" class="menu-btn" >
				<!-- <i class="fa fa-window-close"></i> -->
			</div><!--menu-btn-->

			<div class="loggout">
				<a <?php if(@$_GET['url'] == ''){ ?>
					style="padding: 0px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>">
					<i class="fa fa-home"></i> <span>Página Inicial</span></a>
					<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
				</div><!--loggout-->
				<div class="clear"></div>
			</div>
		</header>
		<div id="main"  class="content">
			<?php Painel::carregarPagina(); ?>
		</div>
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/responsive.js"></script>
		

	</body>
	</html>