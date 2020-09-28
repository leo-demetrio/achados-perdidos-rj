<?php 
namespace Projeto\APRJ\Model;

class ModelVeiculo
{
	private $id_reg;
	private $placa;
	private $modelo;
	private $cor;
	private $dataRegistro;
	private $nomeProprietario;
	private $situacao;
	private $dados = array();

	public function __construct(
		 $id_reg,
		 $placa,
		 $modelo,
		 $cor,
		 $dataRegistro,
		 $nomeProprietario,
		 $situacao


	) {
		
		$this->id_reg = $id_reg;
		$this->placa = $placa;
		$this->modelo = $modelo;
		$this->cor = $cor;
		$this->dataRegistro = $dataRegistro;
		$this->nomeProprietario = $nomeProprietario;
		$this->situacao = $situacao;

	}
	
	public function inserir($tabela)
	{

		$query = "INSERT INTO $tabela(id_reg, placa, modelo, cor, data_registro, nome_proprietario, situacao) VALUES (:id_reg, :placa, :modelo, :cor, :data_registro, :nome_proprietario, :situacao)";

		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_reg', $this->id_reg);
		$stmt->bindValue(':placa', $this->placa);
		$stmt->bindValue(':modelo', $this->modelo);
		$stmt->bindValue(':cor', $this->cor);
		$stmt->bindValue(':data_registro', $this->dataRegistro);
		$stmt->bindValue(':nome_proprietario', $this->nomeProprietario);
		$stmt->bindValue(':situacao', $this->situacao);
		$result = $stmt->execute();
		// print_r($result);exit;
	}

	public static function buscaPeloId($tabela, $id_reg){
			//echo $tabela;exit;
		$query =
            "SELECT id_reg, placa, modelo, cor, data_registro, nome_proprietario, situacao FROM $tabela WHERE id_reg = :id_reg";
		// echo $query;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_reg', $id_reg);
		$stmt->execute();
		$veiculos = $stmt->fetchAll();
		return $veiculos;
	}
	public static function buscaPelaPlaca($tabela){
		
		$query = "SELECT id_reg,placa FROM $tabela WHERE placa = :placa";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':placa', $this->placa);
		$stmt->execute();
		return $stmt->fetch();

	}
	public static function excluir($placa)
	{
		$query = "DELETE FROM veiculos WHERE placa = :placa";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':placa', $placa);
		$stmt->execute();
	}
	//fazer métodos set e get

	public function setIdReg($valor){
		 $this->id_reg = $valor;
	}
	public function setPlaca($valor){
		 $this->placa = $valor;
	}
	public function setModelo($valor){
		 $this->modelo = $valor;
	}
	public function setCor($valor){
		 $this->cor = $valor;
	}
	public function setDataRegistro($valor){
		 $this->dataRegistro = $valor;
	}
	public function setNomeProprietario($valor){
		 $this->nomeProprietario = $valor;
	}
	public function setSituacao($valor){
		 $this->situacao = $valor;
	}
	// public function __set($nome, $valor){
	// 	 echo $nome.'set';
	// 	$this->dados[$nome] = $valor;
	// 	echo $this->id_reg;exit;
	// }

	public function __get($nome){
		return $this->dados[$nome];
	}
}