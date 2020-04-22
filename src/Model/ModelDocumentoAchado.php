<?php

namespace Projeto\APRJ\Model;


class ModelDocumentoAchado
{
	private $id_reg;
	private $numeroDocumento;
	private $tipoDocumento;
	private $dataPerda;
	private $dataRegistro;
	private $nomeDocumento;
	private $situacao;

	public function inserirAchado()
	{
		
		$query = "INSERT INTO doc_achado (id_reg,numero_documento, tipo_documento,data_perda,data_registro,nome_documento,situacao) VALUES (:id_reg,:numero_documento,:tipo_documento,:data_perda,:data_registro,:nome_documento,:situacao)";
		//echo $id;echo$numero;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_reg', $this->id_reg);
		$stmt->bindValue(':numero_documento', $this->numeroDocumento);
		$stmt->bindValue(':tipo_documento', $this->tipoDocumento);
		$stmt->bindValue(':data_perda', $this->dataPerda);
		$stmt->bindValue(':data_registro', $this->dataRegistro);
		$stmt->bindValue(':nome_documento', $this->nomeDocumento);
		$stmt->bindValue(':situacao', $this->situacao);
		$stmt->execute();

		//var_dump($stmt);exit;
			
	}
	public function buscaPeloNumero($numero){
		$query = 'SELECT id_reg,numero_documento FROM doc_achado WHERE numero_documento = :numero';
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':numero', $numero);
		$stmt->execute();
		return $stmt->fetch();
	}
	public function buscaPeloId(){
		$query = 'SELECT numero_documento, tipo_documento, data_perda, data_registro, nome_documento, situacao FROM doc_achado WHERE id_reg = :id';
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id_reg);
		$stmt->execute();
		$documentos = $stmt->fetchAll();
		return $documentos;
	}

	public function excluir(int $numero): bool
	{
		$query = "DELETE FROM doc_achado WHERE numero_documento = :numero";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':numero', $numero);
		$result = $stmt->execute();
		return $result;
		// var_dump($result);die('excluiu');
	}
	public function setIdReg($valor){
		$this->id_reg = $valor;
	}
	public function setNumeroDocumento($valor){
		$this->numeroDocumento = $valor;
	}
	public function setTipoDocumento($valor){
		$this->tipoDocumento = $valor;
	}
	public function setDataPerda($valor){
		$this->dataPerda = $valor;
	}
	public function setDataRegistro($valor){
		$this->dataRegistro = $valor;
	}
	public function setNomeDocumento($valor){
		$this->nomeDocumento = $valor;
	}
	public function setSituacao($valor){
		$this->situacao = $valor;
	}
}