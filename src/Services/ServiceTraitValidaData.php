<?php
namespace Projeto\APRJ\Services;


trait ServiceTraitValidaData
{
	public static function validaData($data){

		if(strlen($data) != 10) return false;

		if(!strpos($data, "-")) return false;

		$datas = explode("-", $data);

		$ano = $datas[0];
		$mes = $datas[1];
		$dia = $datas[2];

		if (strlen($ano) != 4) return false;

		if(!checkdate($mes, $dia, $ano)) return false;

		$data_atual = date("y-m-d");

		if(strtotime($data) > strtotime($data_atual)) return false;
		return true;
	}
}