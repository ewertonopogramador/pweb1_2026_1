<?php

include '../../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('usuarios');

$success = '';
$actionError = '';
$errors = [];

$data = new stdClass();

if (empty($_POST['id'])) {

    unset($_POST['id']);

    $db->store($_POST);

    $success = "Usuário cadastrado com sucesso!";
} else {

    $db->update($_POST);

    $success = "Usuário atualizado com sucesso!";
}

if (!empty($_GET['id'])) {

    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) {

    $data = (object) $_POST;

    try {

        if (empty($_POST['nome'])) {
            $errors[] = "<li>Nome é obrigatório</li>";
        }

        if (empty($_POST['telefone'])) {
            $errors[] = "<li>Telefone é obrigatório</li>";
        }

        if (empty($_POST['email'])) {
            $errors[] = "<li>Email é obrigatório</li>";
        }

        if (empty($_POST['senha'])) {
            $errors[] = "<li>Senha é obrigatória</li>";
        }

        if (empty($errors)) {

            if (empty($_POST['id'])) {

                $db->store($_POST);

                $success = "Usuário cadastrado com sucesso!";
            } else {

                $db->update($_POST);

                $success = "Usuário atualizado com sucesso!";
            }
        }
    } catch (Exception $e) {

        $actionError = $e->getMessage();
    }
}
?>

<div class="form-crud">

    <!-- Mensagens de sucesso e erro -->
    <?php actionMessage($success, $actionError); ?>
    <?php showValidationError($errors); ?>

    <!-- Formulário de cadastro/edição de usuário -->
    <form action="" method="post">

        <h3>Cadastro de Usuário</h3>

        <input type="hidden" name="id"
            value="<?= isset($data->id) ? $data->id : ''; ?>">

        <div class="row g-3">

            <div class="col-md-6">
                <label>Nome</label>
                <input type="text"
                    name="nome"
                    class="form-control"
                    value="<?= isset($data->nome) ? $data->nome : ''; ?>">
            </div>

            <div class="col-md-6">
                <label>Telefone</label>
                <input type="text"
                    name="telefone"
                    class="form-control"
                    value="<?= isset($data->telefone) ? $data->telefone : ''; ?>">
            </div>

            <div class="col-md-6">
                <label>Email</label>
                <input type="email"
                    name="email"
                    class="form-control"
                    value="<?= isset($data->email) ? $data->email : ''; ?>">
            </div>

            <div class="col-md-6">
                <label>Senha</label>
                <input type="password"
                    name="senha"
                    class="form-control">
            </div>

        </div>

        <!-- Botões do formulário -->
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-success">
                Salvar
            </button>
            <a href="usuarioList.php" class="btn btn-primary">
                Voltar
            </a>
        </div>

    </form>

</div>

<?php include '../../footer.php'; ?>