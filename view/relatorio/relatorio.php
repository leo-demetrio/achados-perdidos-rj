 <?php require __DIR__ . '/../header.php' ?>
 	
 <!-- Início tabela Veiculos -->
 <div class="relatorio">	
 	<table class="relatorio-table">
 		<thead class="relatorio-thead">
 			<tr class="tr">Veículos</tr>

      <?php if(count($veiculos) > 0): ?>
 			<tr>
 				<!-- <th>Nome Denunciante</th> -->
 				<th class="th">Placa</th>
 				<th class="th">Modelo</th>
 			<!-- 	<th>Cor</th>
 				<th class="th" class="td">Data registro</th>
 				<th class="th" class="td">Nome proprietário</th>
 				<th class="th" class="td">Situação</th> -->
 				<th class="th">Editar</th>
 				<th class="th">Excluir</th>
 			</tr>
 		</thead>
  
 		<tbody>

 	<?php foreach ($veiculos as $registro): ?> 	
  		
 		<tr>
      <?php //echo $registro['nome_documento']?>
  		<!-- <td><?php// echo $registro['nome'] ?></td> -->
  		<td class="td"><?php echo  $registro['placa'] ?></td>
  		<td class="td"><?php echo $registro['modelo'] ?></td>
  	<!-- 	<td class="td"><?//php echo $registro['cor'] ?></td>
  		<td class="td"><?//php echo $registro['data_registro'] ?></td>
  		<td class="td"><?//php echo $registro['nome_proprietario'] ?></td>
  		<td class="td"><?//php echo $registro['situacao'] ?></td> -->
      <td><a href="/editar" class="green link">editar</a></td>
      <td><a href="/excluir-veiculo?placa=<?php echo $registro['placa']?>" class="red link">excluir</a></td>
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
        <th class="th">Documento número:</th>
        <th class="th">Tipo documento</th>
      <!--   <th>Data perda</th>
        <th>Data registro</th>
        <th>Nome proprietário</th>
        <th>Situação</th> -->
        <th class="th">Editar</th> 
        <th class="th">Excluir</th>
      </tr>
    </thead>
  
    <tbody>

  <?php foreach ($documentos as $registro): ?>  
      
    <tr>
      
      <td class="td"><?php echo  $registro['numero_documento'] ?></td>
      <td class="td"><?php echo $registro['tipo_documento'] ?></td>
     
      <td class="td"><a href="/editar" class="green link">editar</a></td>
      <td class="td"><a href="/excluir-documento?numero_documento=<?php echo $registro['numero_documento']?>" class="red link">excluir</a></td>
      </tr>     

    <?php endforeach ?>

    <?php else: ?>
      <p>Nenhum cadastro de documento no nosso banco</p>
    <?php endif ?>

      </tbody>
    </table>

    <h2>Documentos Achados

    <?php foreach($documentosAchados as $docAchado): ?>

    <p>Número: 

      <?php echo $docAchado['numero_documento'] ?>
      <p class="btn-achados">  
      <td><a href="/editar" class="green link">editar</a></td>
      <td><a href="/excluir-documentos-achados?numero_documento=<?php echo $docAchado['numero_documento']?>" class="red link">excluir</a></td>
      </p>
      

    </p>


  <?php endforeach ?> 

</div>




<?php require __DIR__ . '/../footer.php' ?>



