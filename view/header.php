<!DOCTYPE html>
<html>
<head>
	<title>APRJ</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/reset-mayer.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<meta name="viewport" content="width=device-width,initial-sacle=1">
</head>
<body>

		
	<?php if(isset($_SESSION['id'])): ?>
	<header>
		<a href="/home-logado"><h1 class="logo">Achados e perdidos RJ</h1></a>
		<nav>
			<ul>
				<li><a href="/home-logado">Home</a></li>
				<li><a href="/cadastro-documento">Documento</a></li>
				<li><a href="/cadastro-veiculo">Veiculos</a></li>
				<li><a href="/">Quem somos</a></li>
				<li><a href="/relatorio">Relatorio</a></li>
				<li><a href="/sair">Sair</a></li>
				<li><?php echo $_SESSION['nome']?></li>
			</ul>
		</nav>
	</header>
	<?php endif ?>
	

	<div class="container">

	<?php if(isset($_SESSION['mensagem'])): ?>

	<div class="alert alert-<?php $_SESSION['tipo_mensagem']?>">
		<?php echo $_SESSION['mensagem'] ?>
	</div>

	<?php 
	endif;
	unset($_SESSION['tipo_mensagem']);
	unset($_SESSION['mensagem'])
	 ?>


	<h2 class="titulo-pagina"><?php echo $titulo ?></h2>
