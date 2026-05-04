<?php 
    include './php/header.php'
?>

< class="col">
<form action="resultadoFormAluno.php" method="get">
    <div class="col-6">
        <label for="nome">Nome</label>
        <input type="text" name ="nome" calss="form-control">
    </div>
    <div class="col-6">
        <label for="email">Email</label>
        <input type="text" name ="email" calss="form-control">
    </div>
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

<?php 
    include '../php/footer.php'
?>