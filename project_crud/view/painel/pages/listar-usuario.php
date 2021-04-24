<?php  verificaPermissaoPagina (2); ?>
<?php 
//Delete the desired user from the list
if(isset($_GET['excluir'])){
	$idExcluir = intval($_GET['excluir']);
	Painel::deletar('clientes',$idExcluir);
}
//Call the function of list
$listagem = Painel::selectALL('clientes');  ?>

<div class="box-content "  >
	<h2>Listar usuários</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Imagem</td>
				<td>ID</td>
				<td>Usuario</td>
				<td>Nome</td>
				<td>Cargo</td>
				<td>Excluir</td>
				<td>Editar Cargo</td>
			</tr>
			<?php 
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
				<td><a class="btn-delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-usuario?excluir=<?php echo $value['id']; ?>">Excluir</a></td>
				<td>
					<form style="width: 100%;" method="post" enctype="multipart/form-data">
						<?php require_once("../../controller/alterar-cargo.php"); ?>

						<div style="display: none;"  class="form-group">
							<label>Login:</label>
							<input type="text" name="usuario" value="<?php echo $value ['usuario']; ?>" >
						</div><!--form-group-->

						<div class="form-group">
							<label>Editar Cargo:</label>
							<select name="cargo" value="<?php echo pegaCargo($value ['cargo']); ?>" required>
								<?php
					foreach (Painel::$cargos as $key => $value) {
						if($key == 0 || $key == 1 || $key == 2) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
							</select>
						</div><!--form-group-->
						<div class="form-group">
							<input style="width: 100%; " type="submit" name="acao" value="Alterar cargo">
						</div><!--form-group-->
					</form>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>
</div><!--box-content-->
