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

	public function inserirAchado($post)
	{
		var_dump($post);exit;
		$query = "INSERT INTO doc_achado (id_reg,numero_documento, tipo_documento,data_perda,data_registro,nome_documento,situacao) VALUES (:id_reg,:numero_documento,:tipo_documento,:data_perda,:data_registro,:nome_documento,:situacao)";
		//echo $id;echo$numero;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_reg', $post['id_reg']);
		$stmt->bindValue(':numero_documento', $post['numero']);
		$stmt->bindValue(':tipo_documento', $post['tipo-documento']);
		$stmt->bindValue(':data_perda', $post['data_perda']);
		$stmt->bindValue(':data_registro', $post['dataRegistro']);
		$stmt->bindValue(':nome_documento', $post['nome']);
		$stmt->bindValue(':situacao', $post['situacao']);
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

	public function excluir(string $numero): bool
	{
		$query = "DELETE FROM doc_achado WHERE numero_documento = :numero";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':numero', $numero);
		$result = $stmt->execute();
		return $result;
		// var_dump($result);die('excluiu');
	}
	public function excluirPeloIdDoc(string $numero): bool
	{
		$query = "DELETE FROM doc_achado WHERE id_doc = :numero";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':numero', $numero);
		$result = $stmt->execute();
		return $result;
		// var_dump($result);die('excluiu');
	}
	public function editar($post,$tabela)
	{
		$query = "UPDATE $tabela SET 
		id_reg = :id_reg,
		numero_documento = :numero_documento,
		tipo_documento = :tipo_documento,
		data_perda = :data_perda,
		data_registro = :data_registro,
		nome_documento = :nome_documento,
		situacao = :situacao 
		WHERE id_doc = :id_doc;";
		// echo $query;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_doc', $post['id_doc']);
		$stmt->bindValue(':id_reg', $post['id_reg']);
		$stmt->bindValue(':numero_documento', $post['numeroDocumento']);
		$stmt->bindValue(':tipo_documento', $post['tipoDocumento']);
		$stmt->bindValue(':data_perda', $post['dataPerda']);
		$stmt->bindValue(':data_registro', $post['dataRegistro']);
		$stmt->bindValue(':nome_documento', $post['nomeDocumento']);
		$stmt->bindValue(':situacao', $post['situacao']);
		$stmt->execute();

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