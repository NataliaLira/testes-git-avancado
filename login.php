<!DOCTYPE html>
<html lang="en">
  <?php require_once("inc/head.php"); ?>
<body>
  <?php require_once("inc/header.php") ?>

  <div class="container">
    <div class="mt-5">
      <form action="utils/validaLogin.php" method="POST">
        <h1>Preencha o formulário para efetuar login</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum reiciendis eveniet, similique obcaecati qui corporis dolore quisquam placeat incidunt facilis? Facere aspernatur dolorum vitae sequi ut at doloremque, quia aut.</p>
        <div class="form-row">
          <div class="form-group col-md-12">
            <div class="col-md-6">
              <label for="input-email">E-mail</label>
              <input type="text" class="form-control" name="email" id="input-email" placeholder="Email@exemplo.com">
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-6">
              <label for="input-senha">Senha</label>
              <input type="password" class="form-control" name="senha" id="input-senha">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Logar</button>
        </div>
      </form>
    </div>
  </div>

  <?php require_once("inc/footer.php"); ?>
</body>
</html>