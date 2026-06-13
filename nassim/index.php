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


<div class="container mt-4">


    <div class="text-center mb-5">
        <h1>Perfumaria Nassim</h1>
        <p class="text-muted">
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
