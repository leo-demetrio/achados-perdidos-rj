<?php

namespace Projeto\APRJ\Model;


class ModelPrincipal
{
	public function inserir($id, $nome, $telefone, $telefoneRecado, $email)
	{
		$query = "INSERT INTO registro_completo (id_reg, nome, telefone, telefone_recado, email) VALUES (:id, :nome, :telefone, :telefoneRecado, :email)";
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
