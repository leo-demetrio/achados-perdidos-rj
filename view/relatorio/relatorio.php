 <?php require __DIR__ . '/../header.php' ?>
 	

 <div class="relatorio">	
 	<table class="relatorio-table">
 		<thead class="relatorio-thead">
 			<tr class="tr">Veículos</tr>
 			<tr>
 				<!-- <th>Nome Denunciante</th> -->
 				<th>Placa</th>
 				<th>Modelo</th>
 				<th>Cor</th>
 				<th>Data registro</th>
 				<th>Nome proçprietário</th>
 				<th>Situação</th>
 				<th>Editar</th>
 				<th>Excluir</th>
 			</tr>
 		</thead>
  
 		<tbody>

 	<?php foreach ($registros as $registro){ ?> 	
  		
 		<tr>
  		<!-- <td><?php// echo $registro['nome'] ?></td> -->
  		<td><?php echo  $registro['placa'] ?></td>
  		<td><?php echo $registro['modelo'] ?></td>
  		<td><?php echo $registro['cor'] ?></td>
  		<td><?php echo $registro['data_registro'] ?></td>
  		<td><?php echo $registro['nome_proprietario'] ?></td>
  		<td><?php echo $registro['situacao'] ?></td>
  		</tr>
  		
  		

  	<?php } ?>

  		</tbody>
  	</table>

</div>




<?php require __DIR__ . '/../footer.php' ?>



<!-- <div class="relatorio">
<pre>
<?php echo count($registros);print_r($registros);exit; ?>
 </pre>
<div> -->
 	

<!-- <pre>
<?php// echo count($registros);print_r($registros);exit; ?>
 </pre>
  		<div class="relatorio">

  		<?php //echo $registros['nome'] ?><br>
  		<?php //echo  $registros['placa'] ?><br>
  		<?php //echo $registros['modelo'] ?><br>
  		<?php// echo $registros['cor'] ?><br>
  		<?php// echo $registros['data_registro'] ?><br>
  		<?php// echo $registros['nome_proprietario'] ?><br>
  		<?php //echo $registros['situacao'] ?><br>
  		<div>







<?php //require __DIR__ . '/../footer.php' ?>

 -->