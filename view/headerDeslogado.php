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

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<!-- body -->
<body>



<header>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light color-header">
        <a class="navbar-brand" href="/">Achados e Perdidos RJ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/documento">Documentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/veiculo">Veiculos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/login">Login</a>
                </li>

            </ul>
        </div>
    </nav>


</header>



<div class="container">
    <?php
    if(isset($_SESSION['mensagem'])):
        ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?>">
            <?php echo $_SESSION['mensagem'] ?>
        </div>

    <?php
    endif;
    unset($_SESSION['tipo_mensagem']);
    unset($_SESSION['mensagem'])
    ?>


    <h2 class="titulo-pagina"><?php echo $titulo ?></h2>

    <a class="btn btn-primary" href="/login" role="button">Cadastrar Documento</a>
    <a class="btn btn-warning" href="/veiculo" role="button">Cadastrar veículo</a>