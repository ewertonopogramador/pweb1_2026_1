<?php

include '../../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('produtos');

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

        if (empty($_POST['marca'])) {
            $errors[] = "<li>Marca é obrigatória</li>";
        }

        if (empty($_POST['preco'])) {
            $errors[] = "<li>Preço é obrigatório</li>";
        }

        if (empty($_POST['estoque'])) {
            $errors[] = "<li>Estoque é obrigatório</li>";
        }

        if (empty($errors)) {

            if (empty($_POST['id'])) {

                unset($_POST['id']);

                $db->store($_POST);

                $success = "Produto cadastrado com sucesso!";
            } else {

                $db->update($_POST);

                $success = "Produto atualizado com sucesso!";
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

    <!-- Formulário de cadastro/edição de produto -->
    <form action="" method="post">

        <h3>Cadastro de Produto</h3>

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
                <label>Marca</label>
                <input type="text"
                    name="marca"
                    class="form-control"
                    value="<?= isset($data->marca) ? $data->marca : '' ?>">
            </div>

            <div class="col-md-6">
                <label>Preço</label>
                <input type="number"
                    step="0.01"
                    name="preco"
                    class="form-control"
                    value="<?= isset($data->preco) ? $data->preco : '' ?>">
            </div>

            <div class="col-md-6">
                <label>Estoque</label>
                <input type="number"
                    name="estoque"
                    class="form-control"
                    value="<?= isset($data->estoque) ? $data->estoque : '' ?>">
            </div>

        </div>

        <!-- Botões do formulário -->
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-success">
                Salvar
            </button>
            <a href="produtoList.php" class="btn btn-primary">
                Voltar
            </a>
        </div>

    </form>

</div>

<?php include '../../footer.php'; ?>