<!DOCTYPE html>
<html lang="en">
  <?php require_once("inc/head.php"); ?>
<body>
  <?php 
    session_start();
    if($_SESSION){
      $logado = $_SESSION["logado"];
      $nivel_acesso = $_SESSION["nivel_acesso"];
      
      if(!isset($logado) || $nivel_acesso != 1){
        header("Location: index.php");
      }

      if($nivel_acesso == 1){
        $active = "admin";
      }
    }
    
    require_once("inc/header.php");

    require_once("config/conn.php");

    // Excluindo usuário
    if (isset($_GET) && $_GET["id"]) {
      $query = $db->prepare('DELETE FROM usuarios WHERE id = :id');
      
      $query->execute([
        ":id" => $_GET["id"]
      ]);
    }

    $sql = "SELECT * FROM usuarios WHERE nivel_acesso = :nivel_acesso";

    $query = $db->prepare($sql);

    $query->execute([
      ":nivel_acesso" => 0
    ]);

    $redatores = $query->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <?php if(!$redatores): ?>
  <div class="container">
    <div class="mt-5">
      <h1>Redatores</h1>
      <p>Desculpe não temos redatores para listar</p>
    </div>
  </div>
  <?php else: ?>
    <div class="container">
      <div class="mt-5">
        <h1>Redatores</h1>
        <p>Verifique abaixo os redatores cadastrados em nossa plataforma</p>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
              <thead>
                <tr>                                            
                  <th>Redator</th>
                  <th>E-mail</th>
                  <th>Nível de Acesso</th>
                  <th colspan="2">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($redatores as $redator): ?>
                  <tr>
                    <td><?= $redator['nome'] ?></td>
                    <td><?= $redator['email'] ?></td>
                    <td><?= $redator['nivel_acesso'] ?></td>
                    <td>
                      <a href="cadastroRedator.php?id=<?= $redator["id"] ?>">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="listandoRedatores.php?id=<?= $redator["id"] ?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>			
              </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php require_once("inc/footer.php"); ?>
</body>
</html>