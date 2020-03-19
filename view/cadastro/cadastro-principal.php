<?php require __DIR__ . '/../header.php'; ?>
	


<form id="form" action="/salvar-principal" method="post">
	<fieldset>
		<legend>Cadastro principal</legend>
		<p>
			<label for="nome">Nome:</label><br>
			<input type="text" name="nome" id="nome"/>
		</p>

		<p>
			<label for="telefone">Telefone:</label><br>
			<input type="tel" name="telefone" id="telefone">
		</p>
		<p>
			<label for="telefone-recado">Telefone recado:</label><br>
			<input type="telefone-recado" name="telefone-recado" id="telefone-recado">
		</p>

		<p>
			<input type="submit" value="Submit">
		</p>

	</fieldset>
</form>


