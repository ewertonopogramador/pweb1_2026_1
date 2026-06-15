<?php

include '../../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('categorias');

if (!empty($_GET['delete'])) {

    $db->destroy($_GET['delete']);

    echo "<div class='alert alert-success'>
            Categoria excluída com sucesso!
          </div>";
}

$categorias = $db->all();

?>

<div class="list-crud">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Lista de Categorias</h2>

        <a href="categoriaForm.php" class="btn btn-success">
            <i class="fa-solid fa-plus me-1"></i>
            Nova Categoria
        </a>

    </div>

    <form class="mb-4">

        <div class="input-group">

            <input
                type="text"
                id="pesquisa"
                class="form-control"
                placeholder="Pesquisar categoria...">

            <button type="button" class="btn btn-warning">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

        </div>

    </form>

    <div class="table-responsive">

        <table class="table table-striped table-hover table-bordered" id="tabelaCategorias">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nome da Categoria</th>
                    <th>Descrição</th>
                    <th>Coleção da Categoria de Perfumes</th>
                    <th width="170">Ações</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($categorias as $categoria): ?>

                    <tr>

                        <td><?= $categoria->id ?></td>

                        <td><?= $categoria->nome ?></td>

                        <td><?= $categoria->descricao ?></td>

                        <td><?= $categoria->colecaoperfume ?></td>

                        <td>

                            <a href="categoriaForm.php?id=<?= $categoria->id ?>"
                                class="btn btn-primary btn-sm">

                                <i class="fa-solid fa-pen-to-square"></i>

                            </a>

                            <a href="?delete=<?= $categoria->id ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja excluir esta categoria?')">

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

        let linhas = document.querySelectorAll("#tabelaCategorias tbody tr");

        linhas.forEach(function(linha) {

            let nomeCategoria = linha.cells[1].textContent.toLowerCase();

            if (nomeCategoria.includes(filtro)) {

                linha.style.display = "";

            } else {

                linha.style.display = "none";

            }

        });

    });
</script>

<?php include '../../footer.php'; ?>
```