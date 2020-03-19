 <?php require __DIR__ . '/../header.php' ?>
 	
 	

<pre>
<?php echo count($registros);print_r($registros);exit; ?>
 </pre>
  		<div class="relatorio">

  		<?php echo $registros['nome'] ?><br>
  		<?php echo  $registros['placa'] ?><br>
  		<?php echo $registros['modelo'] ?><br>
  		<?php echo $registros['cor'] ?><br>
  		<?php echo $registros['data_registro'] ?><br>
  		<?php echo $registros['nome_proprietario'] ?><br>
  		<?php echo $registros['situacao'] ?><br>
  		<div>







<?php require __DIR__ . '/../footer.php' ?>
