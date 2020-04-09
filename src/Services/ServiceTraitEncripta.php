<?php

namespace Projeto\APRJ\Services;

trait ServiceTraitEncripta
{
	public static function encriptaSenha($senha){


		return password_hash($senha, PASSWORD_ARGON2I);

	}
}