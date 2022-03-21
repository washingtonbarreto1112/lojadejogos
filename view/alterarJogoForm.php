<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

extract($_REQUEST, EXTR_OVERWRITE);

$informa = visuJogoCodigo($conn,$idjogo);


?>

<div class="container">

<form class="row g-3" action="../controler/alterarJogo.php" method="post">
  <input type="hidden" name="codigojogo" value="<?=$informa["idjogo"]?>">
  <div class="col-md-6">
    <label for="inputJogo" class="form-label">Nome</label>
    <input type="text" name="nomejogo" value="<?=$informa["nomejogo"] ?>" class="form-control" id="inputJogo" required>
  </div>
  <div class="col-md-6">
    <label for="inputvalor5" class="form-label">Valor</label>
    <input type="" name="valorjogo" value="<?=$informa["valorjogo"] ?>" class="form-control" id="inputvalor5" required>
  </div>
  <div class="col-md-6">
    <label for="inputGenero" class="form-label">Genêro</label>
    <select id="inputGenero" name="generojogo" class="form-select">
      <option selected>Escolha...</option>
      <option value="RPG">RPG</option>
      <option value="Aventura">Aventura</option>
      <option value="Puzzle">Puzzle</option>
      <option value="FPS">FPS</option>
      <option value="Corrida">Corrida</option>
    </select>
  </div>
  <div class="col-6">
    <label for="inputstudiojogo" class="form-label">Studio de criação do jogo</label>
    <input type="text" name="studiojogo" value="<?=$informa["studiojogo"] ?>" class="form-control" id="inputstudiojogo" placeholder="xxxxxxxxxx" required>
  </div>
  
  <div class="col-4">
    <label for="inputdatalancamento" class="form-label">Data de lançamento</label>
    <input type="date" name="datalancamentojogo" value="<?=$informa["datalancamentojogo"] ?>" class="form-control" id="inputdatalancamento" placeholder="xx/xx/xxxx" required>
    <div class="col-5">
    <label for="inputquantidade" class="form-label">Quantidade</label>
    <input type="number" name="qtdjogo" value="<?=$informa["qtdjogo"] ?>" class="form-control" id="inputquantidade" placeholder="xxx">
  </div>
  </div>
 
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar</button>
  </div>
</form>

</div>

<?php
include_once("footer.php");
?>
