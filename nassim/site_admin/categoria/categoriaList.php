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

<h2>Lista de Categorias</h2>

<a href="categoriaForm.php"
    class="btn btn-success mb-3">

    Nova Categoria

</a>

<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($categorias as $categoria): ?>

            <tr>

                <td><?= $categoria->id ?></td>
                <td><?= $categoria->nome ?></td>
                <td><?= $categoria->descricao ?></td>

                <td>

                    <a href="categoriaForm.php?id=<?= $categoria->id ?>"
                        class="btn btn-primary btn-sm">

                        Editar

                    </a>

                    <a href="?delete=<?= $categoria->id ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Deseja excluir esta categoria?')">

                        Excluir

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<?php include '../../footer.php'; ?>