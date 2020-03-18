<?php

namespace Projeto\APRJ\Model;


class ModelPrincipal
{
	public function inserir($id, $nome, $telefone, $telefoneRecado, $email)
	{
		$query = "INSERT INTO :id, :nome, :telefone, :telefoneRecado, :email FROM  registro_completo";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':nome', $nome);
		$stmt->bindValue(':telefone', $telefone);
		$stmt->bindValue(':telefoneRecado', $telefoneRecado);
		$stmt->bindValue(':email', $email);
		$stmt->execute();

	}
}
