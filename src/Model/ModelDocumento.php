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

	public function __construct(

		$id_reg,
		$numeroDocumento,
		$tipoDocumento,
		$dataPerda,
		$dataRegistro,
		$nomeDocumento,
		$situacao
	){
		$this->id_reg = $id_reg;
		$this->numeroDocumento = $numeroDocumento;
		$this->tipoDocumento = $tipoDocumento;
		$this->dataPerda = $dataPerda;
		$this->dataRegistro = $dataRegistro;
		$this->nomeDocumento = $nomeDocumento;
		$this->situacao = $situacao;
	}

	public function inserir($tabela)
	{
		
		$query = "INSERT INTO $tabela (id_reg,numero_documento, tipo_documento,data_perda,data_registro,nome_documento,situacao) VALUES (:id_reg,:numero_documento,:tipo_documento,:data_perda,:data_registro,:nome_documento,:situacao)";
	
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
	public function buscaPeloNumero($tabela) {

		$query = "SELECT id_reg,numero_documento FROM $tabela WHERE numero_documento = :numero";
		// echo $query;exit();
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':numero', $this->numeroDocumento);
		$stmt->execute();
		$res = $stmt->fetch(\PDO::FETCH_ASSOC);
		// echo $this->numero;
		// print_r($res);exit;
		return $res;
	}

	public static function buscaPeloId($tabela, $id_reg){

		
		$query = "SELECT numero_documento, tipo_documento, data_perda, data_registro, nome_documento, situacao FROM $tabela WHERE id_reg = :id_reg";
		// echo $query;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_reg', $id_reg);
		$stmt->execute();
		$documentos = $stmt->fetchAll();
		return $documentos;
	}
	public static function excluir(string $numero)
	{
		$query = "DELETE FROM documentos WHERE numero_documento = :numero";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':numero', $numero);

		return $stmt->execute();
		
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