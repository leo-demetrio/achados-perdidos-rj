<?php

namespace Projeto\APRJ\Model;


class ModelDao
{
	public function buscaTodosRegistros(int $id_reg)
	{
		$query = 
		"SELECT 
		d.numero_documento,
		d.tipo_documento,
		da.numero_documento as doc_acha,
		da.tipo_documento as tip_doc_acha,
		v.placa,
		v.modelo,

		FROM
		documentos as d on d.id_reg = :id_reg JOIN
		doc_achados as da on da.id_reg = :id_reg JOIN
		veiculos as v on v.id_reg = :id_reg";

		echo $query;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_reg', $id_reg);
		$stmt->execute();
		$result = $stmt->fetchAll();
		var_dump("$result");
	}
}