<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Código do jogo</label>
    <div class="input-group">
      <div class="input-group-text">Código</div>
      <input type="text" name="codigoJogo" class="form-control" id="inlineFormInputGroupUsername" placeholder="Código do jogo">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pesquisar</button>
  </div>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">código</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Genêro</th>
      <th scope="col">Alterar</th>
    </tr>
  </thead>
  <tbody>
  <?php
$codigojogo = isset ($_POST["codigoJogo"])? $_POST["codigoJogo"]:"" ;

if($codigojogo){

$dado = visuJogoCodigo($conn,$codigojogo);

if($dado){

?>
    <tr>
    <th scope="row"><?=$dado["idjogo"] ?></th>
      <td><?=$dado["nomejogo"] ?></td>
      <td><?=$dado["valorjogo"] ?></td>
      <td><?=$dado["qtdjogo"] ?></td>
      <td><?=$dado["generojogo"] ?></td>
      <td>

    <form action="../view/alterarJogoForm.php" method="post">

      <input type="hidden" value="<?=$dado["idjogo"] ?>" name="idjogo">
      <button type="submit" class="bnt btn-primary">Alterar</button>

      </form>
      </td>

    
         <!-- Button trigger modal -->
         <td><button type="button" class="btn btn-danger" codigo="<?=$dado["idjogo"] ?>" codigo="<?=$codigoJogo["codigojogo"] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
  Delete
</button></td>
    </tr>
    <?php
    }
    }
    ?>
  </tbody>
</table>

</div>

    
    <!-- Modal -->
<div class="modal" tabindex="-1" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Excluir usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
      <form action="../controler/deletarJogo.php" method="get">
     <input type="hidden" class="codigo form-control" name="codigojogo">
      <button type="submit" class="btn btn-danger">Sim</button>
      </form>
        
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>

<script>

var deletarJogoModal = document.getElementById('deleteModal');
  deletarJogoModal.addEventListener('show.bs.modal',function(event){
    var button = event.relatedTarget;
    var codigo = button.getAttribute('codigo');
   

    var modalBody = deletarJogoModal.querySelector('.modal-body');
    modalBody.textContent = 'Gostaria de excluir o jogo de Código ' + codigo + '?';
    
    var Codigo = deletarJogoModal.querySelector('.modal-footer .codigo');
    Codigo.value = codigo;

  })

</script>

<?php

include_once("../view/footer.php")

?>