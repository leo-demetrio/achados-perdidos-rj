<?php
namespace Projeto\APRJ\Model;


class ModelLogin
{
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
		$query = "SELECT email, senha FROM registro WHERE email = :email";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		$email = $stmt->fetch();
		//var_dump($email);exit;
		$this->email = $email['email'];
		$this->senha = $email['senha'];
		//var_dump($this->email);exit;
		return $this->email;

	}

	public function getEmail(){

		return $this->email;
	}
	public function getSenha(){

		return $this->senha;
	}
}