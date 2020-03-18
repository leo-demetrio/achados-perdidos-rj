<?php require __DIR__ . '/../header.php'; ?>
	


<form id="form" action="/rescue-pricipal" method="post">
	<fieldset>
		<legend>Cadastra Documento</legend>

		<p>
			<label for="tipo-documento">Tipo documento:</label><br>
			<select name="tipo-documento">
				<option name="identidade">Identidade</option>
				<option name="habilitacao">Habilitação</option>
				<option name="cpf">Cpf</option>
			</select>
		</p>

		<p>
			<label for="numero">Número:</label><br>
			<input type="number" name="numero" id="numero">
		</p>

		<p>
			<input type="submit" value="Submit">
		</p>
	</fieldset>
</form>

