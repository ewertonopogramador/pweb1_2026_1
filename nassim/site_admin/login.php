<?php

// Página de login do administrador
include '../header.php';
include_once './database/db.class.php';

// Cria objeto de acesso ao banco para a tabela de usuários
$db = new db('usuarios');

$erro = '';

// Verifica se o formulário foi enviado
if ($_POST) {

    // Busca o usuário pelo email informado
    $usuario = $db->findBy('email', $_POST['email']);

    // Valida a senha usando password_verify
    if ($usuario && password_verify($_POST['senha'], $usuario->senha)) {

        // Guarda dados do usuário na sessão para autenticação
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;

        header("Location: ../index.php");
        exit;
    }

    // Mensagem exibida quando as credenciais estão incorretas
    $erro = "Email ou senha inválidos";
}
?>




<form method="post">
    <input type="email"
        name="email"
        class="form-control mb-2"
        placeholder="Email" required>
    <input type="password"
        name="senha"
        class="form-control mb-2"
        placeholder="Senha" required>
    <button type="submit" class="btn btn-primary"> Entrar </button>

    <a href="registrar.php" class="btn btn-success"> Cadastrar </a>
</form>

<?php if (!empty($erro)) { ?>
    <div class="alert alert-danger mt-2">
        <?php echo $erro; ?>
    </div>
<?php } ?>