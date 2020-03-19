 <?php require __DIR__ . '/../header.php' ?>
 
	<?php echo $registros[0]['nome']; ?>
  <?php foreach($registros as $registro): ?>

  	<ul>
  		<li><?php echo $registro['nome'] ?></li>
  		<li><?php echo $registro['placa'] ?></li>
  		<li><?php echo $registro['modelo'] ?></li>
  		<li><?php echo $registro['cor'] ?></li>
  		<li><?php echo $registro['data_registro'] ?></li>
  		<li><?php echo $registro['nome_propritario'] ?></li>
  		<li><?php echo $registro['situacao'] ?></li>
  	</ul>

  <?php endforeach ?>






<?php require __DIR__ . '/../footer.php' ?>