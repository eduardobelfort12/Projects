<?php  verificaPermissaoPagina (1,2); ?>
<div class="box-content ">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

	<form method="post" enctype="multipart/form-data">
		<?php require_once("../../controller/cadastro.php"); ?>

		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="usuario">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				<?php
					foreach (Painel::$cargos as $key => $value) {
						if($key == 0 || $key == 1 || $key == 2) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
		</div><!--form-group-->
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" id="files" name="imagem"/>
			<div class="imagem-usuario">
				<img id="image" src="../images/sem-foto.png" />
			</div><!--avatar-usuario-->
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
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