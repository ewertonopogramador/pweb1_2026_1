<?php


// Carrega cabeçalho e classes necessárias
include 'header.php';
include 'site_admin/database/db.class.php';


// Criar conexão PDO diretamente com o banco de dados
try {
    $conn = new PDO('mysql:host=localhost;dbname=nassim_db;port=3306;charset=utf8', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro na conexão: ' . $e->getMessage());
}


// Busca os totais de cada entidade para exibir no dashboard
$totalUsuarios = $conn->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
$totalProdutos = $conn->query("SELECT COUNT(*) FROM produtos")->fetchColumn();
$totalCategorias = $conn->query("SELECT COUNT(*) FROM categorias")->fetchColumn();
$totalVendas = $conn->query("SELECT COUNT(*) FROM vendas")->fetchColumn();


?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nassim Perfum</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div class="container mt-4">


        <div class="text-center mb-5">
            <h1>Perfumaria Nassim</h1>
            <p class="lead">
                Sistema de Gerenciamento
            </p>
        </div>


        <div class="row g-4">
            <div class="col-md-3">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5>Usuários</h5>
                        <h2><?= $totalUsuarios ?></h2>


                        <a class="btn btn-primary" href="site_admin/ususario/usuarioList.php">Acessar</a>


                    </div>
                </div>
            </div>



            <div class="col-md-3">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5>Produtos</h5>
                        <h2><?= $totalProdutos ?></h2>


                        <a class="btn btn-primary" href="site_admin/produto/produtoList.php"> Acessar</a>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5> Categorias</h5>
                        <h2><?= $totalCategorias ?></h2>


                        <a class="btn btn-primary" href="site_admin/categoria/categoriaList.php">Acessar</a>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5>Vendas</h5>
                        <h2><?= $totalVendas ?></h2>


                        <a class="btn btn-primary" href="site_admin/venda/vendaList.php">Acessar</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="row" style="margin-top: 230px;">`
                <div class="col-12">
                    <h2 class="titulo-nassim pb-4 mb-2 fst-italic border-bottom text-center">
                        A Essência do Luxo: Descubra a Exclusividade da Nassim Perfum
                    </h2>
                </div>

                <div class="row">
                    <!--inicio corpo da história-->
                    <div class="col-8">
                        <!-- requisito 4 Conteúdo com Article e Aside -->
                        <article class="blog-post">
                            <h2 class="blog-post-titulo">Bem-vindo ao Nassim Perfum</h2>
                            <p class="justify-content">Nassim, de origem árabe (نَسِيم), significa “brisa suave” — uma essência invisível que toca, envolve e permanece.</p>
                            <p class="justify-content">Inspirada na riqueza cultural do Oriente, nossa marca nasce da união entre tradição e sofisticação. Cada fragrância carrega notas intensas, misteriosas e marcantes, como os mercados antigos, o ouro reluzente e as noites profundas do deserto.</p>
                            <p class="justify-content">Mais do que perfumes, criamos experiências. Aromas que despertam sensações, constroem memórias e revelam identidades únicas.</p>
                            <p class="justify-content">Aqui, luxo não é apenas aparência — é essência.</p>
                            <p class="justify-content">Descubra Nassim. Sinta o poder de uma presença inesquecível.</p>

                        </article>
                    </div>
                    <!--fim corpo postagem-->

                    <!--inicio menu lateral direito-->
                    <div class="col-4">
                        <div class="position-sticky pt-4" style="top: 2rem">

                            <div class="card-nassim p-4 mb-4" style="border-left: 4px solid gold;">
                                <h4 class="fst-italic">Experiências Nassim</h4>

                                <p class="mb-2 text-warning">★★★★★</p>
                                <p class="mb-3">
                                    “Uma fragrância envolvente e elegante. A Nassim não é apenas um perfume, é presença.”
                                    <br><strong>— Layla Hassan</strong>
                                </p>

                                <p class="mb-2 text-warning">★★★★★</p>
                                <p class="mb-3">
                                    “Notas intensas e sofisticadas, me senti em um verdadeiro mercado árabe de luxo.”
                                    <br><strong>— Omar Al-Farid</strong>
                                </p>

                                <p class="mb-2 text-warning">★★★★★</p>
                                <p class="mb-0">
                                    “Exclusividade em cada detalhe. É o tipo de perfume que marca quem você é.”
                                    <br><strong>— Yasmin Khalid</strong>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        </main>
        <footer class="container-fluid py-4 mt-5">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="#" class="text-decoration-none text-white"> Projeto Desenvolvimento Web 1 Ewerton </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <span class="text-warning">NASSIM PERFUMES © 2026</span>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>