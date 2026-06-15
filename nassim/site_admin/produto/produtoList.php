<?php
include '../autenticacao.php';
include '../../header.php';
include_once "../database/db.class.php";

$db = new db('produtos');

if (!empty($_GET['delete'])) {

    $db->destroy($_GET['delete']);

    echo "<div class='alert alert-success'>
            Produto excluído com sucesso!
          </div>";
}

$produtos = $db->all();

?>

<div class="list-crud">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Lista de Produtos</h2>

        <a href="produtoForm.php" class="btn btn-success">
            <i class="fa-solid fa-plus me-1"></i>
            Novo Produto
        </a>

    </div>

    <form class="mb-4">

        <div class="input-group">

            <input
                type="text"
                id="pesquisa"
                class="form-control"
                placeholder="Pesquisar Produto...">

            <button type="button" class="btn btn-warning">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

        </div>

    </form>

    <div class="table-responsive">

        <table class="table table-striped table-hover table-bordered" id="tabelaProdutos">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th width="170">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($produtos as $produto): ?>

                    <tr>

                        <td><?= $produto->id ?></td>
                        <td><?= $produto->nome ?></td>
                        <td><?= $produto->marca ?></td>
                        <td>
                            R$ <?= number_format($produto->preco, 2, ',', '.') ?>
                        </td>
                        <td><?= $produto->estoque ?></td>

                        <td>

                            <a href="produtoForm.php?id=<?= $produto->id ?>"
                                class="btn btn-primary btn-sm">

                                <i class="fa-solid fa-pen-to-square"></i>

                            </a>

                            <a href="?delete=<?= $produto->id ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja excluir este produto?')">

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

    pesquisa.addEventListener("keyup", function() {

        let filtro = this.value.toLowerCase();

        let linhas = document.querySelectorAll("#tabelaProdutos tbody tr");

        linhas.forEach(function(linha) {

            let nomeProduto = linha.cells[1].textContent.toLowerCase();

            if (nomeProduto.includes(filtro)) {

                linha.style.display = "";

            } else {

                linha.style.display = "none";

            }

        });

    });
</script>

<?php include '../../footer.php'; ?>