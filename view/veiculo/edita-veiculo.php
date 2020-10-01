<?php require __DIR__ . '/../header.php';?>

    <form action="/periste/edita-veiculo" method="post">
        <input type="hidden" name="flag" value="<?= $flag ?>">
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" name="placa" id="placa" aria-describedby="emailHelp" value="<?= isset($veiculo) ? $veiculo['placa'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="modelo" class="form-control" name="modelo" id="modelo" value="<?= isset($veiculo) ? $veiculo['modelo'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="cor">Cor</label>
            <input type="cor" class="form-control" name="cor" id="cor" value="<?= isset($veiculo) ? $veiculo['cor'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="nome-proprietario">Nome proprietário</label>
            <input type="nome-proprietario" class="form-control" name="nome-proprietario" id="nome-proprietario" value="<?= isset($veiculo) ? $veiculo['nome_proprietario'] : '' ?>">
        </div>
        <label for="situacao">Situação</label><br>
        <select class="custom-select my-1 mr-sm-2" name="situacao" id="situacao">
            <option selected value="<?= isset($veiculo) ? $veiculo['situacao'] : 'perdido' ?>"><?= isset($veiculo) ? $veiculo['situacao'] : 'perdido' ?></option>

            <option value="achado">Achado</option>
            <option value="furtado">Furtado</option>
            <option value="roubado">Roubado</option>
        </select>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require __DIR__ . '/../footer.php'; ?>
<!--

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
-->

