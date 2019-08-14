<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Portal DH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <?php if($active == "admin"): ?>
          <li class="nav-item">
            <a class="nav-link" href="indexLogados.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastroRedator.php">Cadastro de Redator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listandoRedatores.php">Listar Redatores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listandoNoticias.php">Listar Notícias</a>
          </li>
        <?php elseif($active == "redator"): ?>
          <li class="nav-item">
            <a class="nav-link" href="indexLogados.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastroNoticia.php">Cadastrar Notícia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listandoNoticias.php">Listar Notícias</a>
          </li>
        <?php elseif($active == "comum"): ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#noticias">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contato">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#localizacao">Localização</a>
          </li>
        <?php endif; ?>
      </ul>
      <?php if($active == "admin" || $active == "redator"): ?>
        <div class="form-inline my-2 my-lg-0">
          <div class="name-user">Olá, <?= $_SESSION["nome"] ?></div>
          <a href="../utils/logout.php">
            <button class="btn btn-outline-success my-2 my-sm-0">Sair</button>
          </a>
        </div>
      <?php elseif($active == "comum"): ?>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      <?php endif; ?>
    </div>
  </nav>
</header>