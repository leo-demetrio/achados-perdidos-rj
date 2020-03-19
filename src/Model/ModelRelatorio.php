<?php
namespace Projeto\APRJ\Model;

class ModelRelatorio
{
	public function buscaRegistros($id)
	{
		$query = "SELECT DISTINCT(rc.nome), v.placa, v.modelo,v.cor, v.data_registro,v.nome_proprietario,v.situacao FROM registro_completo as rc INNER JOIN veiculos as v ON rc.id_reg = :id";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$registros = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $registros;
	}
}