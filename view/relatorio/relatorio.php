 <?php require __DIR__ . '/../header.php' ?>
 	
 <!-- Início tabela Veiculos -->
 <div class="relatorio">	
 	<table class="relatorio-table">
 		<thead class="relatorio-thead">
 			<tr class="tr">Veículos</tr>

      <?php if(count($veiculos) > 0): ?>
 			<tr>
 				<!-- <th>Nome Denunciante</th> -->
 				<th>Placa</th>
 				<th>Modelo</th>
 				<th>Cor</th>
 				<th>Data registro</th>
 				<th>Nome proprietário</th>
 				<th>Situação</th>
 				<th>Editar</th>
 				<th>Excluir</th>
 			</tr>
 		</thead>
  
 		<tbody>

 	<?php foreach ($veiculos as $registro): ?> 	
  		
 		<tr>
      <?php //echo $registro['nome_documento']?>
  		<!-- <td><?php// echo $registro['nome'] ?></td> -->
  		<td><?php echo  $registro['placa'] ?></td>
  		<td><?php echo $registro['modelo'] ?></td>
  		<td><?php echo $registro['cor'] ?></td>
  		<td><?php echo $registro['data_registro'] ?></td>
  		<td><?php echo $registro['nome_proprietario'] ?></td>
  		<td><?php echo $registro['situacao'] ?></td>
  		</tr>  		

  	<?php endforeach ?>

    <?php else: ?>
      <p>Nenhum cadastro de veículo nosso banco</p>
    <?php endif ?>

  		</tbody>
  	</table>

 <!-- Início tabela Documentos -->
 
  <table class="relatorio-table">
    <thead class="relatorio-thead">
      <tr class="tr">Documentos</tr>

    <?php if(count($documentos) > 0): ?>
      <tr>
        <!-- <th>Nome Denunciante</th> -->
        <th>Documento número:</th>
        <th>Tipo documento</th>
        <th>Data perda</th>
        <th>Data registro</th>
        <th>Nome proprietário</th>
        <th>Situação</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
  
    <tbody>

  <?php foreach ($documentos as $registro): ?>  
      
    <tr>
      <?php //echo $registro['nome_documento']?>
      <!-- <td><?php// echo $registro['nome'] ?></td> -->
      <td><?php echo  $registro['numero_documento'] ?></td>
      <td><?php echo $registro['tipo_documento'] ?></td>
      <td><?php echo $registro['data_perda'] ?></td>
      <td><?php echo $registro['data_registro'] ?></td>
      <td><?php echo $registro['nome_documento'] ?></td>
      <td><?php echo $registro['situacao'] ?></td>
      </tr>     

    <?php endforeach ?>

    <?php else: ?>
      <p>Nenhum cadastro de documento no nosso banco</p>
    <?php endif ?>

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