<?php 
namespace Projeto\APRJ\Model;

class ModelVeiculoAchado
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
	
	public function inserir()
	{
		$query = "INSERT INTO veiculos_achados (id_reg, placa, modelo, cor, data_registro, nome_proprietario, situacao) VALUES (:id_reg, :placa, :modelo, :cor, :data_registro, :nome_proprietario, :situacao)";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		// echo $this->placa.'id';exit;
		$stmt->bindValue(':id_reg', $this->id_reg);
		$stmt->bindValue(':placa', $this->placa);
		$stmt->bindValue(':modelo', $this->modelo);
		$stmt->bindValue(':cor', $this->cor);
		$stmt->bindValue(':data_registro', $this->dataRegistro);
		$stmt->bindValue(':nome_proprietario', $this->nomeProprietario);
		$stmt->bindValue(':situacao', $this->situacao);
		$stmt->execute();
	}
	public function editar()
	{
		//echo $this->placa;exit;
		$query = "UPDATE veiculos_achados  SET id_reg = :id_reg, placa = :placa, modelo = :modelo, cor = :cor, 
        data_registro = :data_registro, nome_proprietario = :nome_proprietario, situacao = :situacao WHERE id_reg = :id_reg";

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
		 //print_r($result);exit;
	}

	public function buscaPeloId(){
		$query = 'SELECT id_reg, placa, modelo, cor, data_registro, nome_proprietario, situacao FROM veiculos_achados WHERE id_reg = :id';
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id_reg);
		$stmt->execute();
		$veiculos = $stmt->fetchAll();
		return $veiculos;
	}
	public static function buscaPelaPlaca($placa){
		
		$query = "SELECT id_reg,placa,modelo,cor,data_registro,nome_proprietario,situacao FROM veiculos_achados WHERE placa = :placa";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':placa', $placa);
		$stmt->execute();
		return $stmt->fetch();

	}
    public static function excluir($placa)
    {
        $query = "DELETE FROM veiculos_achados WHERE placa = :placa";
        $conexao = ModelConexao::conect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':placa', $placa);
        $stmt->execute();
    }
	

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
	

	public function __get($nome){
		return $this->dados[$nome];
	}
}