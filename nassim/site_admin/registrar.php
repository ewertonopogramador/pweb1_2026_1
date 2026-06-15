<?php

include '../header.php';
include_once './database/db.class.php';

$db = new db('usuarios');

$success = '';
$errors = [];

if ($_POST) {

    // validação dos campos obrigatórios
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

        // prepara dados para salvar no banco
        $dados = [
            'nome' => $_POST['nome'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email'],
            'login' => null,
            'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
        ];

        $db->store($dados);
        $success = "Usuário cadastrado com sucesso!";
    }
}
?>

<div class="form-crud">

    <!-- feedback de operação -->
    <?php actionMessage($success); ?>
    <?php showValidationError($errors); ?>

    <!-- formulário de registro -->
    <form method="post">

        <h3>Cadastro de Usuário</h3>

        <div class="row g-3">

            <div class="col-md-6">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '' ?>">
            </div>

            <div class="col-md-6">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?= isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : '' ?>">
            </div>

            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            </div>

            <div class="col-md-6">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>

        </div>

        <!-- ações do formulário -->
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="login.php" class="btn btn-primary">Fazer Login</a>
        </div>

    </form>

</div>

<?php include '../footer.php'; ?>