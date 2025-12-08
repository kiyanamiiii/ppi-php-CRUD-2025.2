<nav class="navbar navbar-dark bg-dark">
    <div class="container-md">
        <a href="index.php" class="navbar-brand">CRUD - PHP</a>
        <?php if (isset($_SESSION['usuario_nome'])): ?>
          <div class="d-flex align-items-center">
              <span class="text-white me-3">Olá, <?= $_SESSION['usuario_nome'] ?></span>
              <a href="logout.php" class="btn btn-outline-light btn-sm">Sair</a>
          </div>
        <?php endif; ?>
    </div>
</nav>