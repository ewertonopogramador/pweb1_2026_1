<?php
    include '../header.php';
    include_once "../pweb1_2026_1/php/blog/admin/database/db.class.php";

    $db = new db('usuario');
    $success = ‘’;
    $error = ‘’;
    $erros = [];

    if (!empty($_POST)) { 
        //var_dump($_POST);
        //exit;
	   try {
		if(empty($_POST['nome'])){
			$erros[] = "<li> O nome é obrigatório</li>";
		}

if(empty($_POST['email'])){
			$erros[] = "<li> O email é obrigatório</li>";
		}

if(empty($erros)){
		  $db ->store($_POST);
		  $success = "Registrado com sucesso!";

            redirect('./usuariolist.php');
		} catch (PDOException $e) {
		$error = $e->getMessage();
	     } catch (Exception $e) {
		$error = $e->getMessage();
}
}
      	  
?>


<div class="row">
	<?php actionMessage($success, $error)?>
	<?php showValidationError($erros)?>
</div>

<form action="usuarioform.php" method="post">
    <div class="col">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>">
    </div>

     <div class="col">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" value=”<?php echo getFormValue(‘email’);?>”>
    </div>

     <div class="col">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" class="form-control" value=”<?php echo getFormValue(‘telefone’);?>”>
    </div>	
    <div class = “mt-2”>
        <button type="submit" class="btn btn-primary">salvar</button>
<a href=”./UsarioList.php” class=”btn btn-primary”>Voltar</a>
    </div>
	
</form>


<?php
    include '../footer.php';
?>
