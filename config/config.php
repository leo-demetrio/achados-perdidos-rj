<?php


/****** CONFIG MYSQL ******/
define('DEBUG', true);

define('DB_DRIVE', 'mysql');
define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'achados_perdidos');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

  
/****** CONFIG EMAIL ******/
define("MAIL", [

	"host" => "smtp.gmail.com",
	"port" => "587",
	"user" => "achadosperdidos2020@gmail.com",
	"password" => "aprj@#\$2020",
	"from_name" => "Achados e Perdidos",
	"from_email" => "achadosperdidos2020@gmail.com"
]);


/****** SESSÕES DISPONÍVEIS *******/
/*Aqui estão todas as sessões utilizadas no programa e onde são iniciadas

$_SESSION['?']
-ip index.php
-data index.php
-id PersiteRegistro.php refere-se ao registro de usuário no banco
-email PersiteRegistro.php
-nome PersitePrincipal.php
*/