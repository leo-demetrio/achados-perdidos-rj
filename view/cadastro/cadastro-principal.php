<?php require __DIR__ . '/../header.php'; ?>
	


<form id="form" action="/salvar-pricipal" method="post">
	<fieldset>
		<legend>Cadastro principal</legend><?php echo $id = $_GET['id']; ?>
		<p>
			<label for="name">Nome:</label><br>
			<input type="text" name="pName" id="name"/>
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


