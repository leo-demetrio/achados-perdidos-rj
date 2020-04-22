<?php 
namespace Projeto\APRJ\Model;


class ModelRegistro
{
	public function inserir($email, $senha, $ip, $data)
	{
		$query = "INSERT INTO registro (email, senha, ip, data_registro) VALUES (:email, :senha, :ip, :data)";
		//echo $email;exit;
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':senha', $senha);
		$stmt->bindValue(':ip', $ip);
		$stmt->bindValue(':data', $data);
		$stmt->execute();
	}
	public function buscaIdPorEmail($email)
	{
		$query = "SELECT id_registro FROM registro WHERE email = :email";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':email', $email);
		$stmt->execute();

		return  $stmt->fetch();

	}
	public function buscaPeloId(int $id): array
	{
		$query = "SELECT nome FROM registro_completo WHERE id_reg = :id";
		$conexao = ModelConexao::conect();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
}