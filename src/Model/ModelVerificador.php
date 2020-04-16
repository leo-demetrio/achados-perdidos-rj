<?php
namespace Projeto\APRJ\Model;


class ModelVerificador
{
	public function verificaDocumento(String $numeroDoc)
	{
		//die("chegou");
		$query = 'SELECT numero_documento, tipo_documento, data_perda, data_registro, nome_documento, situacao FROM documentos WHERE numero_documento = :numeroDoc';
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':numeroDoc', $numeroDoc);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
		// var_dump($result);die("Registros");
	}
}