<?php require __DIR__ . '/../header.php'; ?>
	


<form id="form" action="/salvar-veiculo" method="post">
	<fieldset>
		<legend>Cadastra Veículo</legend>
		<p>
			<label for="placa">Placa:</label><br>
			<input type="text" name="placa" id="placa"/>
		</p>
		<br>
		<p>
			<label for="modelo">Modelo:</label><br>
			<input type="text" name="modelo" id="modelo">
		</p>
		<br>
		<p>
			<label for="cor">Cor:</label><br>
			<input type="text" name="cor" id="cor">
		</p>
		<br>
		<p>
			<label for="nome-proprietario">Nome proprietário:</label><br>
			<input type="text" name="nome-proprietario" id="nome-proprietario">
		</p>
		<br>
		<p>
			<label for="situacao">Situação:</label><br>
			<select type="text" name="situacao" id="situacao">
				<option value="achado">Achado</option>
				<option value="perdido">Perdido</option>
				<option value="furtado">Furtado</option>
				<option value="roubbado">Roubado</option>
			</select>
		</p>	
		<br><br>
		<p>
			<input type="submit" value="Submit">
		</p>
	</fieldset>
</form>


<?php require __DIR__ . '/../footer.php'; ?>