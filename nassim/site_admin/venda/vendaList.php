<?php

include '../../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('vendas');

if (!empty($_GET['delete'])) {

    $db->destroy($_GET['delete']);

    echo "<div class='alert alert-success'>
            Venda excluída com sucesso!
          </div>";
}

$vendas = $db->all();

?>

<h2>Lista de Vendas</h2>

<a href="vendaForm.php"
    class="btn btn-success mb-3">

    Nova Venda

</a>

<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Valor Total</th>
            <th>Data da Venda</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($vendas as $venda): ?>

            <tr>

                <td><?= $venda->id ?></td>
                <td><?= $venda->cliente ?></td>
                <td>R$ <?= number_format($venda->valor_total, 2, ',', '.') ?></td>
                <td><?= date('d/m/Y', strtotime($venda->data_venda)) ?></td>

                <td>

                    <a href="vendaForm.php?id=<?= $venda->id ?>"
                        class="btn btn-primary btn-sm">

                        Editar

                    </a>

                    <a href="?delete=<?= $venda->id ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Deseja excluir esta venda?')">

                        Excluir

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<?php include '../../footer.php'; ?>