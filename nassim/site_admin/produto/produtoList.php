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

<h2>Lista de Produtos</h2>

<a href="produtoForm.php" class="btn btn-success mb-3">
    Novo Produto
</a>


<form class="mb-3">

    <div class="input-group">

        <input
            type="text"
            id="pesquisa"
            class="form-control"
            placeholder="Pesquisar categoria..."
        >

        <button type="button" class="btn btn-primary">
            🔍 Pesquisar
        </button>

    </div>

</form>


<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($produtos as $produto): ?>

            <tr>

                <td><?= $produto->id ?></td>
                <td><?= $produto->nome ?></td>
                <td><?= $produto->marca ?></td>
                <td>R$ <?= number_format($produto->preco, 2, ',', '.') ?></td>
                <td><?= $produto->estoque ?></td>

                <td>

                    <a href="produtoForm.php?id=<?= $produto->id ?>"
                        class="btn btn-primary btn-sm">

                        Editar

                    </a>

                    <a href="?delete=<?= $produto->id ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Deseja excluir este produto?')">

                        Excluir

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<script>

const pesquisa = document.getElementById("pesquisa");

pesquisa.addEventListener("keyup", function () {

    let filtro = this.value.toLowerCase();

    let linhas = document.querySelectorAll("#tabelaProdutos tbody tr");

    linhas.forEach(function (linha) {

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