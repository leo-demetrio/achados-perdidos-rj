<?php
namespace Projeto\APRJ\Model;

class ModelRelatorio
{
	public function buscaRegistros($id)
	{
		$query = "SELECT  distinct(placa), nome, modelo,cor, data_registro,nome_proprietario,situacao FROM registro_completo as rc INNER JOIN veiculos as v ON rc.id_reg = :id";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$registros = $stmt->fetchAll();
		//var_dump($registros);exit;
		return $registros;
	}
}