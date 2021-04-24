<?php  verificaPermissaoPagina (2); ?>
<div class="box-content ">
	<div id="teste"><h1></h1></div>
<?php 
if(isset($_GET['excluir'])){
	$idExcluir = intval($_GET['excluir']);
	
	Painel::deletar('clientes',$idExcluir);
}

?>
	<h2>Pesquisar usuários</h2>
	<form method="POST">
			<div class="form-group">
			<input  type="text" name="id" placeholder="Digite o índice do usuário" >
			<button type="submit" name="acao" value = "Buscar"><i class="fas fa-search"></i></button>
		</div><!--form-group--> 
	</form>
	<h2>Dados dos usuários</h2>

	<div class="wraper-table">
<table>
	<tr>
		<td>Imagem</td>
		<td>ID</td>
		<td>Usuario</td>
		<td>Nome</td>
		<td>Cargo</td>
		<td>Excluir</td>
	</tr>
 <?php
 	if(isset($_POST['acao'])){
		$id = $_POST['id'];
		if(Painel::idExist($id) == true){
 		$listagem = Painel::mostrar($id);
	foreach ($listagem as $key => $value) {
	?> 
	<tr>
		<td class="imagem-usuario">
		<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value ['img']; ?>" />
		</td>
		<td><?php echo $value ['id']; ?></td>
		<td><?php echo $value ['usuario']; ?></td>
		<td><?php echo $value ['nome']; ?></td>
		<td><?php echo pegaCargo($value ['cargo']); ?>
		</td>
		<td><a class="btn-delete" href="<?php echo INCLUDE_PATH_PAINEL ?>buscar-usuario?excluir=<?php echo $value['id']; ?>">Excluir</a></td>
	</tr>
	<?php Painel::alert2('sucesso','Usuário encontrado com sucesso!');
		}}
 else{Painel::alert2('erro','Usuário não existe!');}} 
 ?>
</table>

</div>
</div>	