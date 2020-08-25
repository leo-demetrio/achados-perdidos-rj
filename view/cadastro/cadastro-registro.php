<?php require __DIR__ . '/../header.php'; ?>




<form  action="/salvar-registro" method="post">

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="senha">Password</label>
        <input type="password" class="form-control" name="senha" id="senha">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</>
	

<!--
<form id="form" action="/salvar-registro" method="post">
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
</form>
-->

<?php require __DIR__ . '/../footer.php'; ?>
