<div class="box-content ">
	<h2><i class="fa fa-pencil"></i> Editar Usuário</h2>

	<form method="post" enctype="multipart/form-data">
		<?php require_once("../../controller/alterar-dados.php");?>
<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" id="files" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
			<div class="imagem-usuario">
				<img id="image" src="../images/sem-foto.png" />
			</div><!--avatar-usuario-->
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>
</div><!--box-content-->
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