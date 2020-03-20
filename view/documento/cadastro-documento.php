<?php require __DIR__ . '/../header.php'; ?>
	


<form id="form" action="/salvar-documento" method="post">
	<fieldset>
		<legend>Cadastra Documento</legend>

		<p>
			<label for="nome">Nome no documento:</label><br>
			<input type="text" name="nome" id="nome">
		</p>
		<br>
		<p>
			<label for="tipo-documento">Tipo documento:</label><br>
			<select name="tipo-documento">
				<option  value="identidade">Identidade</option>
				<option  value="Habilitacao">Habilitação</option>
				<option  value="cpf">Cpf</option>
			</select>
		</p>
		<br>
		<p>
			<label for="numero">Número:</label><br>
			<input type="number" name="numero" id="numero">
		</p>
		<br>
		<p>
			<label for="data">Data:</label><br>
			<input type="date" name="data" id="data">
		</p>
		<br>
		<p>
			<label for="situacao">Situação</label><br>
			<select name="situacao">
				<option value="perdido">Perdido</option>
				<option value="furtado">Furtado</option>
				<option value="roubado">Roubado</option>
				<option value="achado">Achado</option>
			</select>
		</p>
		<br>
		<p>
			<input type="submit" value="Submit">
		</p>
	</fieldset>
</form>

