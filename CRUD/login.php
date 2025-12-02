<?php
require 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
  $email = mysqli_real_escape_string($conexao, trim($_POST['email']));

  $sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND email = '$email'";
  $resultado = mysqli_query($conexao, $sql);

  if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_array($resultado);
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    $_SESSION['usuario_email'] = $usuario['email'];
    $_SESSION['mensagem'] = "Bem-vindo, " . $usuario['nome'] . "!";

    header("Location: index.php");
    exit();
  }
  else {
    $_SESSION['mensagem'] = "Usuário não encontrado.";
  }
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-sm" style="width: 100%; max-width: 420px;">
            <div class="card-body p-4">
                <h5 class="card-title mb-3">Entrar</h5>

                <?php include 'mensagem.php'; ?>

                <form method="post" action="">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input id="nome" name="nome" type="text" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" required />
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>

                <div class="mt-3 text-center">
                    <small>Não tem uma conta? <a href="register.php">Criar conta</a></small>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>