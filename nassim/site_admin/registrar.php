<?php

include '../header.php';
include_once './database/db.class.php';

$db = new db('usuarios');

$success = '';
$errors = [];

if ($_POST) {

    if (empty($_POST['nome'])) {
        $errors[] = "<li>Nome é obrigatório</li>";
    }

    if (empty($_POST['email'])) {
        $errors[] = "<li>Email é obrigatório</li>";
    }

    if (empty($_POST['senha'])) {
        $errors[] = "<li>Senha é obrigatória</li>";
    }

    if (empty($errors)) {

            $dados = [

            'nome' => $_POST['nome'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email'],
            'login' => null,

            'senha' => password_hash(
                $_POST['senha'],
                PASSWORD_DEFAULT
            )
            

];


        $db->store($dados);

        $success = "Usuário cadastrado com sucesso!";
    }
}

actionMessage($success);
showValidationError($errors);
?>

<form method="post">

<h3>Cadastro de Usuário</h3>

<div class="mb-2">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control">
</div>

<div class="mb-2">
    <label>Telefone</label>
    <input type="text" name="telefone" class="form-control">
</div>

<div class="mb-2">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
</div>

<div class="mb-2">
    <label>Senha</label>
    <input type="password" name="senha" class="form-control">
</div>

<button type="submit" class="btn btn-success">
    Cadastrar
</button>

<a href="login.php" class="btn btn-primary">
    Fazer Login
</a>

</form>

<?php include '../footer.php'; ?>
