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
}