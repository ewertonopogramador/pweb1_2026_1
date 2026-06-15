<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function actionMessage($success = "", $actionError = "")
{
    if (!empty($success)) {
        echo "<div class='alert alert-success'>$success</div>";
    }

    if (!empty($actionError)) {
        echo "<div class='alert alert-danger'>$actionError</div>";
    }
}

function showValidationError($errors = [])
{
    if (!empty($errors)) {

        echo "<div class='alert alert-danger'><ul>";

        foreach ($errors as $error) {
            echo $error;
        }

        echo "</ul></div>";
    }
}
?>

<title>NASSIM</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid py-4 px-5">

        <a class="navbar-brand" href="/pweb1_2026_1/nassim/index.php">
            NASSIM
        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="/pweb1_2026_1/nassim/index.php">
                Inicio
            </a>

            <?php if (isset($_SESSION['usuario_id'])) : ?>

                <a class="nav-link"
                    href="/pweb1_2026_1/nassim/site_admin/ususario/usuarioList.php">
                    Usuários
                </a>

                <a class="nav-link"
                    href="/pweb1_2026_1/nassim/site_admin/produto/produtoList.php">
                    Produtos
                </a>

                <a class="nav-link"
                    href="/pweb1_2026_1/nassim/site_admin/categoria/categoriaList.php">
                    Categorias
                </a>

                <a class="nav-link"
                    href="/pweb1_2026_1/nassim/site_admin/venda/vendaList.php">
                    Vendas
                </a>

                <span class="navbar-text text-white ms-3">
                    Olá, <?php echo $_SESSION['usuario_nome']; ?>
                </span>

                <a class="nav-link text-warning"
                    href="/pweb1_2026_1/nassim/site_admin/logout.php">
                    Sair
                </a>

            <?php endif; ?>

        </div>

    </div>
</nav>

<div class="container mt-4">
    <div class="row">