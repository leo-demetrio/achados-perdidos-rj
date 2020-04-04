<?php
namespace Projeto\APRJ\Model;


class ModelDocumento
{
	public function inserir($id_reg, $numero_documento, $tipo_documento, $data_perda,$data_registro, $nome_documento, $situacao)
	{
		
		$query = "INSERT INTO documentos (id_reg,numero_documento, tipo_documento,data_perda,data_registro,nome_documento,situacao) VALUES (:id_reg,:numero_documento,:tipo_documento,:data_perda,:data_registro,:nome_documento,:situacao)";
		//echo $id;echo$numero;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_reg', $id_reg);
		$stmt->bindValue(':numero_documento', $numero_documento);
		$stmt->bindValue(':tipo_documento', $tipo_documento);
		$stmt->bindValue(':data_perda', $data_perda);
		$stmt->bindValue(':data_registro', $data_registro);
		$stmt->bindValue(':nome_documento', $nome_documento);
		$stmt->bindValue(':situacao', $situacao);
		$stmt->execute();

		//var_dump($stmt);exit;
			
	}
}