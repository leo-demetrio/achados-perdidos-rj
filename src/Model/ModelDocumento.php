<?php
namespace Projeto\APRJ\Model;


class ModelDocumento
{
	private $id_reg;
	private $numeroDocumento;
	private $tipoDocumento;
	private $dataPerda;
	private $dataRegistro;
	private $nomeDocumento;
	private $situacao;

	public function inserir()
	{
		
		$query = "INSERT INTO documentos (id_reg,numero_documento, tipo_documento,data_perda,data_registro,nome_documento,situacao) VALUES (:id_reg,:numero_documento,:tipo_documento,:data_perda,:data_registro,:nome_documento,:situacao)";
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

	public function buscaPeloId(){
		$query = 'SELECT numero_documento, tipo_documento, data_perda, data_registro, nome_documento, situacao FROM documentos WHERE id_reg = :id';
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id_reg);
		$stmt->execute();
		$documentos = $stmt->fetchAll();
		return $documentos;
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