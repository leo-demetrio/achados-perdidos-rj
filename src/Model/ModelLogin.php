<?php
namespace Projeto\APRJ\Model;


class ModelLogin
{
	public function inserir($nome)
	{
		$query = "INSERT INTO TESTE (nome) values (:nome)";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();

	}
	public function buscaPeloEmail()
	{
		$query = "SELECT id_registro"
	}
}