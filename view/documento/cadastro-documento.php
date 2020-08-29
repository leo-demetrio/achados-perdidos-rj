<?php require_once __DIR__ . '/../header.php'; ?>

<?php //var_dump($documento);exit;?>
<form action="/salvar-documento" method="post">
    <input type="hidden" name="id_doc" value="<?= isset($documento) ? $documento['id_doc'] : '' ?>">
    <div class="form-group">
        <label for="nome">Nome completo</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Example input placeholder" value="<?= isset($documento) ? $documento['nome_documento'] : '';?>">
    </div>

    <div class="form-group">
        <label for="numero">Número</label>
        <input type="number" class="form-control" name="numero" id="numero" placeholder="Another input placeholder" value="<?= isset($documento) ? $documento["numero_documento"] : '';?>">
    </div>

    <label class="my-1 mr-2" for="tipo-documento">Preference</label>
    <select class="custom-select my-1 mr-sm-2" name="tipo-documento" id="tipo-documento">

        <option selected value="<?= isset($documento) ? $documento['tipo_documento'] : 'CARTÃO DO CIDADÃO';?>"><?php if(isset($documento)){ echo $documento['tipo_documento']; }else{ echo 'CARTÃO DO CIDADÃO'; } ?>
            
        </option>

        <option value="CARTÃO DO CIDADÃO">CARTÃO DO CIDADÃO</option>
        <option value="0">--  Favor escolher  --</option><option value="CARTÃO NACIONAL DE SAÚDE - SUS">CARTÃO NACIONAL DE SAÚDE - SUS</option>
        <option value="CARTÃO PASSE ESCOLAR OU PASSE LIVRE">CARTÃO PASSE ESCOLAR OU PASSE LIVRE</option>
        <option value="CARTEIRA DO IDOSO">CARTEIRA DO IDOSO</option>
        <option value="CDI CERTIFICADO DISPENSA E INCORPORACAO">CDI CERTIFICADO DISPENSA E INCORPORACAO</option>
        <option value="CERTIDÃO (NASCIMENTO/CASAMENTO)">CERTIDÃO (NASCIMENTO/CASAMENTO)</option>
        <option value="CERTIFICADO DE RESERVISTA">CERTIFICADO DE RESERVISTA</option>
        <option value="CGC/CNPJ">CGC/CNPJ</option>
        <option value="CNH - CARTEIRA NACIONAL DE HABILITAÇÃO">CNH - CARTEIRA NACIONAL DE HABILITAÇÃO</option>
        <option value="CPF/CIC">CPF/CIC</option>
        <option value="CRLV">CRLV</option>
        <option value="CTPS">CTPS</option>
        <option value="DOCUMENTO DE IDENTIFICAÇÃO INDÍGENA">DOCUMENTO DE IDENTIFICAÇÃO INDÍGENA</option>
        <option value="DOCUMENTO DE VEÍCULO">DOCUMENTO DE VEÍCULO</option>
        <option value="IDENTIDADE PROFISSIONAL - CONSELHOS">IDENTIDADE PROFISSIONAL - CONSELHOS</option>
        <option value="OUTROS">OUTROS</option>
        <option value="PASSAPORTE">PASSAPORTE</option>
        <option value="PIS - PROGRAMA INTEGRAÇÃO SOCIAL">PIS - PROGRAMA INTEGRAÇÃO SOCIAL</option>
        <option value="PORTE, REGISTRO E CERTIFICADO DE ARMAS">PORTE, REGISTRO E CERTIFICADO DE ARMAS</option>
        <option value="RG - DOCUMENTO DE IDENTIDADE">RG - DOCUMENTO DE IDENTIDADE</option>
        <option value="RNE - REGISTRO NACIONAL DE ESTRANGEIROS">RNE - REGISTRO NACIONAL DE ESTRANGEIROS</option>
        <option value="CARTÃO DE DÉBITO/CRÉDITO">CARTÃO DE DÉBITO/CRÉDITO</option><option value="TÍTULO DE ELEITOR">TÍTULO DE ELEITOR</option>

    </select>
    <div class="form-group">
        <label for="data_perda">Data</label>
        <input type="date" class="form-control" name="data_perda" id="data_perda" placeholder="Another input placeholder" value="<?= isset($documento) ? $documento['data_perda'] : '';?>">
    </div>

    <label for="situacao">Situação</label><br>
    <select class="custom-select my-1 mr-sm-2" name="situacao" id="situacao">
        <option selected value="<?= isset($documento) ? $documento['situacao'] : 'Perdido';?>">Perdido</option>

        <option value="achado">Achado</option>
        <option value="furtado">Furtado</option>
        <option value="roubado">Roubado</option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>


</form>

<?php require_once __DIR__ . '/../footer.php';?>
<!--
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
