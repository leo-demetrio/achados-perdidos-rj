 <?php require __DIR__ . '/../header.php' ?>
<!-- Início Veículos -->
 <?php if(count($veiculos) > 0): ?>
     <h3>Veículos</h3>
     <table class="table">
         <thead>
         <tr>
             <th scope="col">Placa</th>
             <th scope="col">Modelo</th>
             <th scope="col">Situação</th>
             <th scope="col">Editar</th>
             <th scope="col">Excluir</th>
         </tr>
         </thead>
         <tbody>
         <?php foreach ($veiculos as $registro): ?>
             <tr>
                 <td class="td"><?php echo  $registro['placa'] ?></td>
                 <td class="td"><?php echo $registro['modelo'] ?></td>
                 <td class="td"><?php echo $registro['situacao'] ?></td>
                 <td><a href="/editar" class="green link">editar</a></td>
                 <td><a href="/excluir-veiculo?placa=<?php echo $registro['placa']?>" class="red link">excluir</a></td>

             </tr>
         <?php endforeach ?>
         </tbody>
     </table>
 <?php endif ?>


 <!-- Inicio Documentos -->
 <?php if(count($documentos) > 0): ?>
     <h3>Documentos</h3>
     <table class="table">
         <thead>
         <tr>
             <th scope="col">Número</th>
             <th scope="col">Tipo</th>
             <th scope="col">Situacao</th>
             <th scope="col">Editar</th>
             <th scope="col">Excluir</th>
         </tr>
         </thead>
         <tbody>
         <?php foreach ($documentos as $registro): ?>
             <tr>
                 <td><?php echo  $registro['numero_documento'] ?></td>
                 <td><?php echo $registro['tipo_documento'] ?></td>
                 <td><?php echo $registro['situacao'] ?></td>
                 <td><a href="/editar" class="green link">editar</a></td>
                 <td><a href="/excluir-documento?numero_documento=<?php echo $registro['numero_documento']?>" class="red link">excluir</a></td>


         <?php endforeach ?>
          <?php foreach($documentosAchados as $docAchado): ?>

              <td><a href="/editar" class="green link">editar</a></td>
              <td><a href="/excluir-documentos-achados?numero_documento=<?php echo $docAchado['numero_documento']?>" class="red link">excluir</a></td>


          <?php endforeach ?>
             </tr>
         </tbody>
     </table>
 <?php endif ?>
 <!-- Fim Documentos -->

<?php require __DIR__ . '/../footer.php' ?>



