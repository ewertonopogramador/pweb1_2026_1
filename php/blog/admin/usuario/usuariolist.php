d<?php
include '../header.php';
include_once "../database/db.class.php";
include '../autenticacao.php';

$db = new db('usuario');

if(!empty($_GET['id'])){
    $db->destroy($_GET['id']);
}


if(!empty($_POST)) {
    //var_dump($_POST);
    //exit;
    //$db->store($_POST);
    $dados = $db->search($_POST);
}else{
    $dados = $db->all();
}

?>

<div class="row">
  <h3>Listagem usuario</h3>
  <form action = "usuariolist.php" method="post">


      <div class="row">
        <div class="col-2">
          <label for ="nome">tipo</label>
          <select name="tipo" class="form-select">
              <option value="nome">Nome</option>
              <option value="telefone">Telefone</option>
              <option value="email">Email</option>
          </select>
      </div>
      <div class ="col-5">
          <label for="valor">Valor</label>
          <input type="text" name="valor" placeholder = "Pesquisar.." class="form-control">
      </div>
      <div class ="col-5">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control">
      </div>
        <div class="col">
            <a href="./usuarioform.php" class="btn btn-success">Novo</a>
        </div>
</div>




<div class="row">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dados as $item){
                    echo "<tr>
                <th scope='row'>$item->id</th>
                <td>$item->nome</td>  
                <td>$item->telefone</td>
                <td>$item->email</td>
                <td><a class='btn btn-danger' title='excluir'
                onclick='return confirm(\"deseja excluir?\")'
                 href='/usuariolist.php?id=$item->id'.>deletar</a></td>    
                </tr>";
                }
            ?>
        </tbody>
    </table>
</div>




<?php
include '../footer.php';
?>


