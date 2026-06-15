<?php

include '../../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('categorias');

$success = '';
$actionError = '';
$errors = [];

$data = new stdClass();

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) {

    $data = (object) $_POST;

    try {

        if (empty($_POST['nome'])) {
            $errors[] = "<li>Nome é obrigatório</li>";
        }

        if (empty($_POST['descricao'])) {
            $errors[] = "<li>Descrição é obrigatória</li>";
        }

        if (empty($errors)) {

            if (empty($_POST['id'])) {

                unset($_POST['id']);

                $db->store($_POST);

                $success = "Categoria cadastrada com sucesso!";
            } else {

                $db->update($_POST);

                $success = "Categoria atualizada com sucesso!";
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

    <!-- Formulário de cadastro/edição de categoria -->
    <form action="" method="post">

        <h3>Cadastro de Categoria</h3>

        <input type="hidden" name="id"
            value="<?= isset($data->id) ? $data->id : '' ?>">

        <div class="row g-3">

            <div class="col-md-6">
                <label>Nome</label>
                <input type="text"
                    name="nome"
                    class="form-control"
                    value="<?= isset($data->nome) ? $data->nome : '' ?>">
            </div>

            <div class="col-md-6">
                <label>Descrição</label>
                <textarea
                    name="descricao"
                    class="form-control"
                    rows="4"><?= isset($data->descricao) ? $data->descricao : '' ?></textarea>
            </div>

            <div class="col-md-6">
                <label>Coleção da Categoria de Perfumes</label>
                <input type="text"
                    name="colecaoperfume"
                    class="form-control"
                    value="<?= isset($data->colecaoperfume) ? $data->colecaoperfume : '' ?>">
            </div>

        </div>

        <!-- Botões do formulário -->
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-success">
                Salvar
            </button>
            <a href="categoriaList.php" class="btn btn-primary">
                Voltar
            </a>
        </div>

    </form>

</div>

<?php include '../../footer.php'; ?>