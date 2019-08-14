<!DOCTYPE html>
<html lang="en">
  <?php require_once("inc/head.php"); ?>
<body>
  <?php 
    session_start();
    if($_SESSION){
      $logado = $_SESSION["logado"];
      $nivel_acesso = $_SESSION["nivel_acesso"];

      if(!isset($logado) && $nivel_acesso != 1){
        header("Location: index.php");
      }

      if($nivel_acesso == 1){
        $active = "admin";
      }
    }

    require_once("inc/header.php");

    require_once("config/conn.php");

    //SELECIONA O USUÁRIO
    if (isset($_GET) && $_GET["id"]) {
      $query = $db->prepare('SELECT * FROM usuarios WHERE id = :id');
      
      $query->execute([
          ":id" => $_GET["id"]
      ]);
      
      $usuario = $query->fetch(PDO::FETCH_ASSOC);
    }
  ?>

  <div class="container">
    <div class="mt-5">
      <?php if(isset($usuario) && $usuario): ?>
      <form action="utils/editarCadastroRedator.php" method="POST">
          <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
          <h1>Preencha o formulário para cadastrar um redator</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum reiciendis eveniet, similique obcaecati qui corporis dolore quisquam placeat incidunt facilis? Facere aspernatur dolorum vitae sequi ut at doloremque, quia aut.</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="input-nome">Nome</label>
              <input type="text" value="<?= $usuario["nome"] ?>" class="form-control" name="nome" id="input-nome" placeholder="Insira seu nome">
            </div>
            <div class="form-group col-md-12">
              <label for="input-email">E-mail</label>
              <input type="text" value="<?= $usuario["email"] ?>" class="form-control" name="email" id="input-email" placeholder="Email@exemplo.com">
            </div>
            <div class="form-group col-md-12">
              <label for="input-senha">Senha</label>
              <input type="password" class="form-control" name="senha" id="input-senha" placeholder="Insira sua senha">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      <?php else: ?>
        <form action="utils/salvarCadastroRedator.php" method="POST">
          <h1>Preencha o formulário para cadastrar um redator</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum reiciendis eveniet, similique obcaecati qui corporis dolore quisquam placeat incidunt facilis? Facere aspernatur dolorum vitae sequi ut at doloremque, quia aut.</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="input-nome">Nome</label>
              <input type="text" class="form-control" name="nome" id="input-nome" placeholder="Insira seu nome">
            </div>
            <div class="form-group col-md-12">
              <label for="input-email">E-mail</label>
              <input type="text" class="form-control" name="email" id="input-email" placeholder="Email@exemplo.com">
            </div>
            <div class="form-group col-md-12">
              <label for="input-senha">Senha</label>
              <input type="password" class="form-control" name="senha" id="input-senha" placeholder="Insira sua senha">
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