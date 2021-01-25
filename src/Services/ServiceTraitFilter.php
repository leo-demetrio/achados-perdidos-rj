<?php
namespace Projeto\APRJ\Services;

trait  ServiceTraitFilter
{

	public static function filtraInteger($variavel) 
	{
		$variavel = filter_var($variavel, FILTER_VALIDATE_INT);
		return $variavel;
	}
	public static function filtraEmail($variavel) 
	{
		$variavel = filter_var($variavel, FILTER_SANITIZE_EMAIL);
		return $variavel;
	}
	public static function filtraString($variavel) 
	{
		$variavel = filter_var($variavel, FILTER_SANITIZE_STRING);
		return $variavel;
	}
}

