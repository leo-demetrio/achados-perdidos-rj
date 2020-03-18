<?php require __DIR__ . '/../header.php'; ?>
	


<form id="form" action="/rescue-pricipal" method="post">
	<fieldset>
		<legend>Cadastro principal</legend>
		<p>
			<label for="name">Nome:</label><br>
			<input type="text" name="pName" id="name"/>
		</p>

		<p>
			<label for="email">Email:</label><br>
			<input type="email" name="pEmail" id="email">
		</p>

		<p>
			<input type="submit" value="Submit">
		</p>
	</fieldset>
</form>


