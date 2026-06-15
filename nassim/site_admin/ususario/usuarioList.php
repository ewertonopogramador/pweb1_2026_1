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

<div class="list-crud">

    <!-- Cabeçalho da página com título e botão de criar novo usuário -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Lista de Usuários</h2>

        <a href="usuarioForm.php" class="btn btn-success">
            <i class="fa-solid fa-plus me-1"></i>
            Novo Usuário
        </a>

    </div>

    <!-- Campo de busca para filtrar usuários na tabela -->
    <form class="mb-4">

        <div class="input-group">

            <input
                type="text"
                id="pesquisa"
                class="form-control"
                placeholder="Pesquisar usuário...">

            <button type="button" class="btn btn-warning">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

        </div>

    </form>

    <!-- Tabela com a lista de usuários -->
    <div class="table-responsive">

        <table class="table table-striped table-hover table-bordered" id="tabelaUsuarios">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th width="170">Ações</th>
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

                                <i class="fa-solid fa-pen-to-square"></i>

                            </a>

                            <a href="?delete=<?= $usuario->id ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja excluir?')">

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
    // Filtra a tabela de usuários conforme o texto digitado
    const pesquisa = document.getElementById("pesquisa");

    pesquisa.addEventListener("keyup", function() {

        let filtro = this.value.toLowerCase();

        let linhas = document.querySelectorAll("#tabelaUsuarios tbody tr");

        linhas.forEach(function(linha) {

            let nomeUsuario = linha.cells[1].textContent.toLowerCase();

            linha.style.display = nomeUsuario.includes(filtro) ? "" : "none";

        });

    });
</script>

<?php include '../../footer.php'; ?>