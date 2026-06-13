<?php
include 'header.php';
include 'site_admin/database/db.class.php';

try {
    $conn = new PDO(
        'mysql:host=localhost;dbname=nassim_db;port=3306;charset=utf8',
        'root',
        ''
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Erro na conexão: " . $e->getMessage());

}

// Totais

$totalUsuarios = $conn->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
$totalProdutos = $conn->query("SELECT COUNT(*) FROM produtos")->fetchColumn();
$totalCategorias = $conn->query("SELECT COUNT(*) FROM categorias")->fetchColumn();
$totalVendas = $conn->query("SELECT COUNT(*) FROM vendas")->fetchColumn();

// Produtos recentes

$produtos = $conn->query("
SELECT *
FROM produtos
ORDER BY id DESC
LIMIT 3
")->fetchAll(PDO::FETCH_ASSOC);

// Categorias

$categorias = $conn->query("
SELECT *
FROM categorias
")->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mt-4">

    <div class="text-center mb-5">

        <h1 class="display-4 fw-bold text-warning">
            Perfumaria Nassim
        </h1>

        <p class="lead text-light">
            A essência do luxo em cada fragrância.
        </p>

    </div>

    <!-- Estatísticas -->

    <div class="row text-center mb-5">

        <div class="col-md-3">

            <div class="card card-nassim p-4">

                <h1 class="text-warning"><?= $totalUsuarios ?></h1>

                <h5>Usuários</h5>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card card-nassim p-4">

                <h1 class="text-warning"><?= $totalProdutos ?></h1>

                <h5>Produtos</h5>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card card-nassim p-4">

                <h1 class="text-warning"><?= $totalCategorias ?></h1>

                <h5>Categorias</h5>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card card-nassim p-4">

                <h1 class="text-warning"><?= $totalVendas ?></h1>

                <h5>Vendas</h5>

            </div>

        </div>

    </div>

    <!-- Produtos -->

    <h2 class="text-center text-warning mb-4">
        Últimos Perfumes Cadastrados
    </h2>

    <div class="row">

        <?php foreach($produtos as $produto){ ?>

            <div class="col-md-4 mb-4">

                <div class="card card-nassim h-100 shadow">

                    <?php if(!empty($produto['imagem'])){ ?>

                        <img src="<?= $produto['imagem'] ?>" class="card-img-top">

                    <?php } ?>

                    <div class="card-body text-center">

                        <h4><?= $produto['nome'] ?></h4>

                        <?php if(isset($produto['descricao'])){ ?>

                            <p><?= $produto['descricao'] ?></p>

                        <?php } ?>

                        <?php if(isset($produto['preco'])){ ?>

                            <h5 class="text-warning">

                                R$
                                <?= number_format($produto['preco'],2,',','.') ?>

                            </h5>

                        <?php } ?>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

    <!-- Categorias -->

    <div class="mt-5">

        <h2 class="text-center text-warning mb-4">

            Nossas Categorias

        </h2>

        <div class="row justify-content-center">

            <?php foreach($categorias as $categoria){ ?>

                <div class="col-md-3 mb-3">

                    <div class="card card-nassim text-center p-3">

                        <h5>

                            <?= $categoria['nome'] ?>

                        </h5>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

    <!-- Botões CRUD -->

    <div class="mt-5">

        <h2 class="text-center text-warning mb-4">

            Administração

        </h2>

        <div class="row">

            <div class="col-md-3 d-grid mb-3">

                <a href="site_admin/usuario/usuarioList.php"
                   class="btn btn-warning">

                    Usuários

                </a>

            </div>

            <div class="col-md-3 d-grid mb-3">

                <a href="site_admin/produto/produtoList.php"
                   class="btn btn-warning">

                    Produtos

                </a>

            </div>

            <div class="col-md-3 d-grid mb-3">

                <a href="site_admin/categoria/categoriaList.php"
                   class="btn btn-warning">

                    Categorias

                </a>

            </div>

            <div class="col-md-3 d-grid mb-3">

                <a href="site_admin/venda/vendaList.php"
                   class="btn btn-warning">

                    Vendas

                </a>

            </div>

        </div>

    </div>

</div>

<?php
include 'footer.php';
?>