<?php require __DIR__ . '/../header.php'; ?>
	


<form id="form" action="/rescue-pricipal" method="post">
	<fieldset>
		<legend>Cadastra Veículo</legend>
		<p>
			<label for="placa">Placa:</label><br>
			<input type="text" name="placa" id="placa"/>
		</p>

		<p>
			<label for="modelo">Modelo:</label><br>
			<input type="text" name="modelo" id="modelo">
		</p>

		<p>
			<input type="submit" value="Submit">
		</p>
	</fieldset>
</form>


