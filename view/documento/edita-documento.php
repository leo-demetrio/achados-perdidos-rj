<?php require __DIR__ . '/../header.php'; ?>

<?= var_dump($documento)?>
<form id="form" action="/salvar-documento" method="post">
	<fieldset>
		<legend>Cadastra Documento</legend>

		<p>
			<label for="nome">Nome no documento:</label><br>
			<input type="text" name="nome" id="nome">
		</p>
		<br>
        <p>
            <label for="numero">Número:</label><br>
            <input type="number" name="numero" id="numero">
        </p>
        <br>
		<p>
			<label for="tipo-documento">Tipo documento:</label><br>
			<select name="tipo-documento">
                <option value="262">CARTÃO DO CIDADÃO</option>
                <option value="0">--  Favor escolher  --</option><option value="460">CARTÃO NACIONAL DE SAÚDE - SUS</option>
                <option value="102">CARTÃO PASSE ESCOLAR OU PASSE LIVRE</option>
                <option value="280">CARTEIRA DO IDOSO</option>
                <option value="100">CDI CERTIFICADO DISPENSA E INCORPORACAO</option>
                <option value="2">CERTIDÃO (NASCIMENTO/CASAMENTO)</option>
                <option value="3">CERTIFICADO DE RESERVISTA</option>
                <option value="4">CGC/CNPJ</option>
                <option value="5">CNH - CARTEIRA NACIONAL DE HABILITAÇÃO</option>
                <option value="6">CPF/CIC</option>
                <option value="380">CRLV</option>
                <option value="7">CTPS</option>
                <option value="103">DOCUMENTO DE IDENTIFICAÇÃO INDÍGENA</option>
                <option value="11">DOCUMENTO DE VEÍCULO</option>
                <option value="1">IDENTIDADE PROFISSIONAL - CONSELHOS</option>
                <option value="99">OUTROS</option>
                <option value="9">PASSAPORTE</option>
                <option value="107">PIS - PROGRAMA INTEGRAÇÃO SOCIAL</option>
                <option value="106">PORTE, REGISTRO E CERTIFICADO DE ARMAS</option>
                <option value="10">RG - DOCUMENTO DE IDENTIDADE</option>
                <option value="101">RNE - REGISTRO NACIONAL DE ESTRANGEIROS</option>
                <option value="300">CARTÃO DE DÉBITO/CRÉDITO</option><option value="12">TÍTULO DE ELEITOR</option>
			</select>
		</p>
		<br>

		<p>
			<label for="data">Data da perda:</label><br>
			<input type="date" name="data_perda" id="data">
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
-->
<?php require __DIR__ . '/../footer.php'; ?>