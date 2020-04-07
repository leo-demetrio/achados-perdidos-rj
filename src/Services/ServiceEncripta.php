<?php

namespace Projeto\APRJ\Services;

class ServiceEncripta
{
	public static function encriptaSenha($senha){


		return password_hash($senha, PASSWORD_ARGON2I);

	}
}