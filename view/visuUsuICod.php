<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Código do usuario</label>
    <div class="input-group">
      <div class="input-group-text">Código</div>
      <input type="text" name="codigoUsu" class="form-control" id="inlineFormInputGroupUsername" placeholder="Código do usuario">
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
      <th scope="col">Email</th>
      <th scope="col">Fone</th>
    </tr>
  </thead>
  <tbody>
  <?php
$codigousu = isset ($_POST["codigoUsu"])? $_POST["codigoUsu"]:"" ;

if($codigousu){

$dado = visuUsuarioCodigo($conn,$codigousu);

if($dado){

?>
    <tr>
      <th scope="row"><?=$dado["idusu"] ?></th>
      <td><?=$dado["nomeusu"] ?></td>
      <td><?=$dado["emailusu"] ?></td>
      <td><?=$dado["foneusu"] ?></td>
      <td>
      <form action="../view/alterarForm.php" method="post">
      
      <input type="hidden" value="<?=$dado["idusu"] ?>" name="idusu">
      <button type="submit" class="bnt btn-primary">Alterar</button>

      </form>

    </td>
    <td>
         <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" codigo="<?=$dado["idusu"] ?>" email="<?=$dado["nomeusu"] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
  Delete
</button>
      </td>
    </tr>
    <?php
    }
    }
    ?>
  </tbody>
</table>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        certeza na exclusão do usuário? não poderá ser desfeita essa ação.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  </div>
</div>


<script>

    var deletarUsuarioModal = document.getElementById('deleteModal');
      deletarUsuarioModal.addEventListener('show.bs.modal',function(event){
        var button = event.relatedTarget;
        var codigo = button.getAttribute('codigo');
        var email = button.getAttribute('email');

        var modalBody = deletarUsuarioModal.querySelector('.modal-body');
        modalBody.textContent = 'Gostaria de excluir o Usuário ' + email + '?';
        
        var Codigo = deletarUsuarioModal.querySelector('.modal-footer .codigo');
        Codigo.value = codigo;

      })

</script>

<?php

include_once("../view/footer.php")

?>