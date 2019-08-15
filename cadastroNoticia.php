<!DOCTYPE html>
<html lang="en">
  <?php require_once("inc/head.php"); ?>
<body>

  <?php 
    session_start();
    if($_SESSION){
      $logado = $_SESSION["logado"];
      $nivel_acesso = $_SESSION["nivel_acesso"];

      if(!isset($logado)){
        header("Location: indexLogados.php");
      }

      if($nivel_acesso == 0){
        $active = "redator";
      }
    }

    require_once("inc/header.php");

    require_once("config/conn.php");

    //SELECIONA A NOTÍCIA
    if (isset($_GET) && $_GET["id"]) {
      $query = $db->prepare('SELECT * FROM noticias WHERE id = :id');
      
      $query->execute([
          ":id" => $_GET["id"]
      ]);
      
      $noticia = $query->fetch(PDO::FETCH_ASSOC);
    }
  ?>

  <div class="container">
    <div class="mt-5">
      <?php if(isset($noticia) && $noticia): ?>
        <form action="utils/editarNoticia.php" method="POST" enctype="multipart/form-data">
          <h1>Preencha o formulário para cadastrar um notícia</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum reiciendis eveniet, similique obcaecati qui corporis dolore quisquam placeat incidunt facilis? Facere aspernatur dolorum vitae sequi ut at doloremque, quia aut.</p>
          <div class="form-row">
          <div class="form-group col-md-12">
              <label for="input-titulo">Título</label>
              <input type="text" value="<?= $noticia["titulo"] ?>" class="form-control" name="titulo" id="input-titulo" placeholder="Insira o título">
            </div>
            <div class="form-group col-md-12">
              <label for="input-imagem">Imagem</label>
              <img src="<?= $noticia["imagem"] ?>" alt="">
              <input type="file" class="form-control" name="imagem" id="input-imagem">
            </div>
            <div class="form-group col-md-12">
              <label for="input-descricao">Descrição</label>
              <textarea value="<?= $noticia["descricao"] ?>" class="form-control" name="descricao" id="input-descricao" placeholder="Insira a descrição da sua notícia..."></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      <?php else: ?>
        <form action="utils/salvarCadastroNoticia.php" method="POST" enctype="multipart/form-data">
          <h1>Preencha o formulário para cadastrar um notícia</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum reiciendis eveniet, similique obcaecati qui corporis dolore quisquam placeat incidunt facilis? Facere aspernatur dolorum vitae sequi ut at doloremque, quia aut.</p>
          <div class="form-row">
          <div class="form-group col-md-12">
              <label for="input-titulo">Título</label>
              <input type="text" class="form-control" name="titulo" id="input-titulo" placeholder="Insira o título">
            </div>
            <div class="form-group col-md-12">
              <label for="input-imagem">Imagem</label>
              <input type="file" class="form-control" name="imagem" id="input-imagem">
            </div>
            <div class="form-group col-md-12">
              <label for="input-descricao">Descrição</label>
              <textarea class="form-control" name="descricao" id="input-descricao" placeholder="Insira a descrição da sua notícia..."></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      <?php endif; ?>
    </div>
  </div>

  <?php require_once("inc/footer.php"); ?>
</body>
</html>