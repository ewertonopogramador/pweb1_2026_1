<?php
include './header.php';
include_once "./database/db.class.php";




$db = new db('usuario');
$success = '';
$actionError = '';
$errors = [];
$data = '';


if(!empty($_GET['id'])){
    $data = $db-> find ($_GET['id']);
}




if (!empty($_POST)) {
    $data = (object) $_POST;
    // var_dump($_POST);
    //exit;
    try {




        if (empty($_POST['nome'])) {
            $errors[] = "<li>O nome é obrigatório</li>";
        }




        if (empty($_POST['email'])) {
            $errors[] = "<li>O email é obrigatório</li>";
        }


        if (empty($_POST['senha'])) {
            $errors[] = "<li>O senha é obrigatório</li>";
            if(strlen($_POST['senha'] <3)){
                $errors[] = "<li>a senha tem q te 3 caracter obobobo</li>";
            }
       
        }




        if (empty($errors)) {

            $usuario = $db->findBy('email', $_POST['email']);

            if($usuario && password_verify($_POST['$senha'], $usuario->senha))
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['usuario_nome'] = $usuario->nome;
                $_SESSION['usuario_email'] = $usuario->email;


                $success = "Usuário logado com sucesso!";
                redirect('./index.php');  
        }
    } catch (PDOException $e) {
        $actionError = $e->getMessage();
    } catch (Exception $e) {
        $actionError = $e->getMessage();
    }
}




?>




<div class="row">
    <?php actionMessage($success, $actionError) ?>
    <?php showValidationError($errors) ?>




    <form action="registrar.php" method="post">
        <h3>Registrar Usuário</h3>
        <div class="col-6">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo getFormValue($data, 'nome'); ?>">
        </div>
        <div class="col-6">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo getFormValue($data,'email'); ?>">
        </div>
        <div class="col-6">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="<?php echo getFormValue($data,'telefone'); ?>">
        </div>


        <div class="col-6">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" value="<?php echo getFormValue($data,'senha'); ?>">
        </div>


        <div class="mt-2">
            <button type="submit" class="btn btn-success">Salvar</button> ja tem uma conta
            <a href="./login.php" class="btn btn-primary"> fazologin aq</a>
        </div>








    </form>




</div>




<?php
include '../footer.php';
?>


