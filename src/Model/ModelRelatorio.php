<?php
namespace Projeto\APRJ\Model;

class ModelRelatorio
{
	private $id;
	public function __construct($id = false){

		if($id){
			$this->id = $id;
			$this->buscaRegistros($id);
		}
	}
	public function buscaRegistros($id)
	{
		$query = "
		SELECT  placa, nome, modelo,cor, v.data_registro,nome_proprietario,v.situacao, nome_documento
		FROM registro_completo as rc 
		INNER JOIN veiculos as v 
		INNER  JOIN documentos as d 
		ON v.id_reg = :id and d.id_reg = :id and rc.id_reg = :id
		";

		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$registros = $stmt->fetchAll();
		//var_dump($registros);exit;
		return $registros;
	}
}


