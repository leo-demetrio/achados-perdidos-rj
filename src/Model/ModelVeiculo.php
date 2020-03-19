<?php 
namespace Projeto\APRJ\Model;

class ModelVeiculo
{
	public function inserir($id, $placa, $modelo, $cor, $dataRegistro, $nomeProprietario, $situacao)
	{
		$query = "INSERT INTO veiculos (id_reg, placa, modelo, cor, data_registro, nome_proprietario, situacao) VALUES (:id, :placa, :modelo, :cor, :data_registro, :nome_proprietario, :situacao)";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':placa', $placa);
		$stmt->bindValue(':modelo', $modelo);
		$stmt->bindValue(':cor', $cor);
		$stmt->bindValue(':data_registro', $dataRegistro);
		$stmt->bindValue(':nome_proprietario', $nomeProprietario);
		$stmt->bindValue(':situacao', $situacao);
		$stmt->execute();
	}
}