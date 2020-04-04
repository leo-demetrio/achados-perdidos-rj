<?php

namespace Projeto\APRJ\Model;

require_once __DIR__ . '/../../config/config.php';

class ModelConexao
{
	public static function conect()
	{
		$conexao = new \PDO(DB_DRIVE . ':host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);

		$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		return $conexao;
	}

}