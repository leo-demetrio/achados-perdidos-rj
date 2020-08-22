<?php
require_once __DIR__ . '/../headerDeslogado.php';
?>



<form action="/salvar-suspeito" method="post">
  <div class="form-group">
    <label for="modelo">Modelo</label>
    <input type="text" class="form-control" name="modelo" id="modelo" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="placa">Placa</label>
    <input type="text" class="form-control" name="placa" id="placa">
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php require_once __DIR__ . '/../footer.php';
