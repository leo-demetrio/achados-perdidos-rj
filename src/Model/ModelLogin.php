<?php
namespace Projeto\APRJ\Model;


class ModelLogin
{
	private $id_registro;
	private $email;
	private $senha;

	public function inserir($nome)
	{
		$query = "INSERT INTO TESTE (nome) values (:nome)";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();

	}
	public function buscaPeloEmail($email)
	{
		$query = "SELECT email, senha, id_registro FROM registro WHERE email = :email";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		$email = $stmt->fetch();
		//var_dump($email);exit;

		//  if(!$email){
		//   throw new \Exception("dados não encontrados no banco");
		// }
		
		$this->email = $email['email'];
		$this->senha = $email['senha'];
		$this->id_registro = $email['id_registro'];
		 //echo $this->id_registro;exit;
		//var_dump($this->email);exit;
		return $this->email;

	}

	public function getEmail(){

		return $this->email;
	}
	public function getSenha(){

		return $this->senha;
	}
	public function getId_registro(){

		return $this->id_registro;
	}
}