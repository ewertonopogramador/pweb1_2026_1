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

<div class="list-crud">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Lista de Vendas</h2>

        <a href="vendaForm.php" class="btn btn-success">
            <i class="fa-solid fa-plus me-1"></i>
            Nova Venda
        </a>

    </div>

    <form class="mb-4">

        <div class="input-group">

            <input
                type="text"
                id="pesquisa"
                class="form-control"
                placeholder="Pesquisar venda...">

            <button type="button" class="btn btn-warning">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

        </div>

    </form>

    <div class="table-responsive">

        <table class="table table-striped table-hover table-bordered" id="tabelaVendas">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Valor Total</th>
                    <th>Data da Venda</th>
                    <th width="170">Ações</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($vendas as $venda): ?>

                    <tr>

                        <td><?= $venda->id ?></td>

                        <td><?= $venda->cliente ?></td>

                        <td>
                            R$ <?= number_format($venda->valor_total, 2, ',', '.') ?>
                        </td>

                        <td>
                            <?= date('d/m/Y', strtotime($venda->data_venda)) ?>
                        </td>

                        <td>

                            <a href="vendaForm.php?id=<?= $venda->id ?>"
                                class="btn btn-primary btn-sm">

                                <i class="fa-solid fa-pen-to-square"></i>

                            </a>

                            <a href="?delete=<?= $venda->id ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja excluir esta venda?')">

                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<script>

const pesquisa = document.getElementById("pesquisa");

pesquisa.addEventListener("keyup", function () {

    let filtro = this.value.toLowerCase();

    let linhas = document.querySelectorAll("#tabelaVendas tbody tr");

    linhas.forEach(function (linha) {

        let cliente = linha.cells[1].textContent.toLowerCase();

        linha.style.display = cliente.includes(filtro) ? "" : "none";

    });

});

</script>

<?php include '../../footer.php'; ?>
```
