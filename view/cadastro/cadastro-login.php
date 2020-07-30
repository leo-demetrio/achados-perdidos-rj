<?php 
require __DIR__ . '/../header.php';
 ?>
	


<form id="form" action="/salvar-login" method="post">
	<fieldset>
		<legend>Cadastro principal</legend>

		<p>
			<label for="email">Email:</label><br>
			<input type="email" name="email" id="email">
		</p>

		<p>
			<label for="senha">Senha:</label><br>
			<input type="password" name="senha" id="senha"/>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</fieldset>

	<p>
		<button><a href="/registro">Cadastrar</a></button>
	</p>
</form>

<?php require __DIR__ . '/../footer.php'; ?>
