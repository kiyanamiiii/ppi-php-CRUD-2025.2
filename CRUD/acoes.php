<?php
require 'verificar-sessao.php';
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
  $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
  $email = mysqli_real_escape_string($conexao, trim($_POST['email']));

  $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

  mysqli_query($conexao, $sql);

  if (mysqli_affected_rows($conexao) > 0) {
    $_SESSION['mensagem'] = "Usuário criado com sucesso!";
    header("Location: index.php");
  }
  else {
    $_SESSION['mensagem'] = "Erro ao criar usuário.";
    header("Location: usuario-create.php");
  }
}

if (isset($_POST['update_usuario'])) {
  $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

  $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
  $email = mysqli_real_escape_string($conexao, trim($_POST['email']));

  $sql = "UPDATE usuarios SET nome = '$nome', email='$email' ";

  $sql .= "WHERE id = '$usuario_id'";

  mysqli_query($conexao, $sql);

  if (mysqli_affected_rows($conexao) > 0) {
    $_SESSION['mensagem'] = "Usuário atualizado com sucesso!";
    header("Location: index.php");
  }
  else {
    $_SESSION['mensagem'] = "Erro ao atualizar usuário.";
    header("Location: index.php");
  }
}

if (isset($_POST['delete_usuario'])) {
  $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

  $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";

  mysqli_query($conexao, $sql);

  if (mysqli_affected_rows($conexao) > 0) {
    $_SESSION['mensagem'] = "Usuário excluído com sucesso!";
    header("Location: index.php");
  }
  else {
    $_SESSION['mensagem'] = "Erro ao excluir usuário.";
    header("Location: index.php");
  }
}

?>
