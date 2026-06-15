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



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - NASSIM</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />

<div class="container login-container">

    <div class="login-card">

        <div class="text-center mb-4">
            <i class="fa-solid fa-user login-icon"></i>
            <h2 class="mt-3">Login</h2>
            <p class="text-light">Acesse sua conta</p>
        </div>

        <form method="post">

            <div class="mb-3">
                <label class="form-label">
                    <i class="fa-solid fa-envelope me-2"></i>Email
                </label>
                <input
                    type="email"
                    name="email"
                    class="form-control login-input"
                    placeholder="Digite seu email"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="fa-solid fa-lock me-2"></i>Senha
                </label>
                <input
                    type="password"
                    name="senha"
                    class="form-control login-input"
                    placeholder="Digite sua senha"
                    required>
            </div>

            <button type="submit" class="btn btn-warning w-100 mb-3">
                <i class="fa-solid fa-right-to-bracket me-2"></i>
                Entrar
            </button>

            <a href="registrar.php" class="btn btn-outline-warning w-100">
                <i class="fa-solid fa-user-plus me-2"></i>
                Cadastrar
            </a>

        </form>

        <?php if (!empty($erro)) { ?>
            <div class="alert alert-danger mt-4">
                <?php echo $erro; ?>
            </div>
        <?php } ?>

    </div>

</div>
