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
                 <div class="d-flex justify-content-end">
                 <td><a  class="btn btn-primary" href="/editar">editar</a></td>
                 <td><a  class="btn btn-danger" href="/excluir-veiculo?placa=<?php echo $registro['placa']?>" class="red link">excluir</a></td>
                 </div>
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
                 
                 <td><a  class="btn btn-primary" href="/editar/documento?id_doc=<?php echo $registro['id_doc']?>&flag=<?php echo 'false'; ?>">editar</a></td>
                 <td><a  class="btn btn-danger" href="/excluir-documento?numero_documento=<?php echo $registro['numero_documento']?>">excluir</a></td>
              </tr>   

         <?php endforeach ?>
         <?php //var_dump($documentosAchados); exit;?>
          <?php foreach($documentosAchados as $docAchado): ?>

            <tr>
                 <td><?php echo  $docAchado['numero_documento'] ?></td>
                 <td><?php echo $docAchado['tipo_documento'] ?></td>
                 <td><?php echo $docAchado['situacao'] ?></td>
              <td><a  class="btn btn-primary" href="/editar/documento?id_doc=<?php echo $docAchado['id_doc']?>&flag=<?php echo 'true'; ?>">editar</a></td>
              <td><a  class="btn btn-danger" href="/excluir-documentos-achados?numero_documento=<?php echo $docAchado['numero_documento']?>">excluir</a></td>
            

          <?php endforeach ?>
            </tr>

         </tbody>
     </table>
 <?php endif ?>
 <!-- Fim Documentos -->

 <!-- Função Jquery Ajax pronta

  id="<?php //echo $registro['numero_documento']?>
 <script>
     $(".excluir-documento").click(function(e){
         e.preventDefault();
         var id = $(this).attr("id");
         var elemento = $(this).parent().parent();
         console.log(id);
         $.ajax({
             type:"POST",
             data:"numero_documento=" + id,
             url:"/excluir-documento",
             async:true
         }).done(function(data){
             console.log(data);
             $(elemento).fadeOut();
         })

     })
 </script>
 -->

<?php require __DIR__ . '/../footer.php' ?>



