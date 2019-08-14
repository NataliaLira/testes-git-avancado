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
        header("Location: index.php");
      }

      if($nivel_acesso == 1){
        $active = "admin";
      } elseif($nivel_acesso == 0)  {
        $active = "redator";
      }
    }

    require_once("inc/header.php");

    require_once("config/conn.php");

    $sql = "SELECT * FROM noticias";

    $query = $db->prepare($sql);

    $query->execute();

    $noticias = $query->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <?php if(!$noticias): ?>
  <div class="container">
    <div class="mt-5">
      <h1>Notícias</h1>
      <p>Desculpe não temos notícias para você hoje =(</p>
    </div>
  </div>
  <?php else: ?>
    <div class="container">
      <div class="mt-5">
        <h1>Notícias</h1>
        <p>Verifique abaixo as notícias mais recentes em nossa plataforma</p>
        <div class="card-deck">
          <?php foreach($noticias as $noticia): ?>
            <div class="card">
              <a href="cadastroNoticia.php?id=<?= $noticia["id"] ?>">
                <img class="card-img-top" src="<?= $noticia["imagem"] ?>" alt="Imagem de capa do card">
              </a>
              <div class="card-body">
                <h5 class="card-title"><?= $noticia["titulo"] ?></h5>
                <p class="card-text"><?= $noticia["descricao"] ?></p>
                <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php require_once("inc/footer.php"); ?>
</body>
</html>