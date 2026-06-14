<?php

include '../../header.php';
include '../autenticacao.php';
include_once "../database/db.class.php";

$db = new db('usuarios');

if (!empty($_GET['delete'])) {

    $db->destroy($_GET['delete']);

    echo "<div class='alert alert-success'>
            Usuário excluído com sucesso!
          </div>";
}

$usuarios = $db->all();

?>

<h2>Lista de Usuários</h2>

<a href="usuarioForm.php" class="btn btn-success mb-3">
    Novo Usuário
</a>


<form class="mb-3">

    <div class="input-group">

        <input
            type="text"
            id="pesquisa"
            class="form-control"
            placeholder="Pesquisar Usuário..."
        >

        <button type="button" class="btn btn-primary">
            🔍 Pesquisar
        </button>

    </div>

</form>

<table class="table table-striped table-bordered" id="tabelaUsuarios">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($usuarios as $usuario): ?>

            <tr>

                <td><?= $usuario->id ?></td>
                <td><?= $usuario->nome ?></td>
                <td><?= $usuario->telefone ?></td>
                <td><?= $usuario->email ?></td>

                <td>

                    <a href="usuarioForm.php?id=<?= $usuario->id ?>"
                        class="btn btn-primary btn-sm">

                        Editar

                    </a>

                    <a href="?delete=<?= $usuario->id ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Deseja excluir?')">

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

    let linhas = document.querySelectorAll("#tabelaUsuarios tbody tr");

    linhas.forEach(function (linha) {

        let nomeUsuario = linha.cells[1].textContent.toLowerCase();

        if (nomeUsuario.includes(filtro)) {

            linha.style.display = "";

        } else {

            linha.style.display = "none";

        }

    });

});



</script>

<?php include '../../footer.php'; ?>