<?php

include '../../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('vendas');

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

        if (empty($_POST['cliente'])) {
            $errors[] = "<li>Cliente é obrigatório</li>";
        }

        if (empty($_POST['valor_total'])) {
            $errors[] = "<li>Valor total é obrigatório</li>";
        }

        if (empty($_POST['data_venda'])) {
            $errors[] = "<li>Data da venda é obrigatória</li>";
        }

        if (empty($errors)) {

            if (empty($_POST['id'])) {

                unset($_POST['id']);

                $db->store($_POST);

                $success = "Venda cadastrada com sucesso!";
            } else {

                $db->update($_POST);

                $success = "Venda atualizada com sucesso!";
            }
        }
    } catch (Exception $e) {

        $actionError = $e->getMessage();
    }
}
?>

<div class="row">

    <?php actionMessage($success, $actionError); ?>
    <?php showValidationError($errors); ?>

    <form action="" method="post">

        <h3>Cadastro de Venda</h3>

        <input type="hidden" name="id"
            value="<?= isset($data->id) ? $data->id : '' ?>">

        <div class="col-6 mb-2">
            <label>Cliente</label>
            <input type="text"
                name="cliente"
                class="form-control"
                value="<?= isset($data->cliente) ? $data->cliente : '' ?>">
        </div>

        <div class="col-6 mb-2">
            <label>Valor Total</label>
            <input type="number"
                step="0.01"
                name="valor_total"
                class="form-control"
                value="<?= isset($data->valor_total) ? $data->valor_total : '' ?>">
        </div>

        <div class="col-6 mb-3">
            <label>Data da Venda</label>
            <input type="date"
                name="data_venda"
                class="form-control"
                value="<?= isset($data->data_venda) ? $data->data_venda : '' ?>">
        </div>

        <button type="submit" class="btn btn-success">
            Salvar
        </button>

        <a href="vendaList.php" class="btn btn-primary">
            Voltar
        </a>

    </form>

</div>

<?php include '../../footer.php'; ?>