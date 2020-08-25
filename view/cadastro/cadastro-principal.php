<?php require __DIR__ . '/../header.php'; ?>


    <form action="/salvar-principal" method="post">
        <div class="form-group" >
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" class="form-control" name="telefone" id="telefone">
        </div>
        <div class="form-group">
            <label for="telefone-recado">Telefone recado:</label>
            <input type="tel" class="form-control" name="telefone-recado" id="telefone-recado">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
	
<!--

<form id="form" action="/salvar-principal" method="post">
	<fieldset>
		<legend>Cadastro principal</legend>
		<p>
			<label for="nome">Nome:</label><br>
			<input type="text" name="nome_completo" id="nome_completo"/>
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
-->

<?php require __DIR__ . '/../footer.php'; ?>