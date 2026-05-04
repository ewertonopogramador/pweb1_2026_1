<?php 
    include '../header.php';
?>

<form action="resultadoFormAluno.php" method="get">
    <h3>Fomulário Aula</h3>
    <div class="col-6">
        <label for="nome">Nome</label>
        <input type="text" name ="nome" calss="form-control">
    </div>
    <div class="col-6">
        <label for="email">Email</label>
        <input type="text" name ="email" calss="form-control">
    </div>
    <div class="col-6">
        <label for="telefone">Telefone</label>
        <input type="number" name ="telefone" calss="form-control">
    </div>
    <div class="col-6">
        <label for="senha">Senha</label>
        <input type="password" name ="senha" calss="form-control">
    </div>
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

<?php 
    include '../footer.php';
?>