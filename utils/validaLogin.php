<?php
  require_once("../config/conn.php");

  $email = $_REQUEST["email"];
  $senha = $_REQUEST["senha"];

  $sql = "SELECT * FROM usuarios WHERE email = :email";

  $query = $db->prepare($sql);

  $query->execute([
    ":email" => $email
  ]);

  $usuario = $query->fetch(PDO::FETCH_ASSOC);

  // Se não encontrar usuário retonarmos erro
  if(!$usuario){
    $erro = true;
  } else {
      // Se a senha não conferir com a do banco de dados
      $senhaValida = password_verify($senha, $usuario["senha"]);
      if(!$senhaValida){
        $erro = true;
      } else {
        // Se encontrar usuário e a senha bater criamos sessão
        // e redirecionamos o usuário
        session_start();

        $_SESSION["logado"] = true;
        $_SESSION["nome"] = $usuario["nome"];
        $_SESSION["nivel_acesso"] = $usuario["nivel_acesso"];

        header("Location: ../indexLogados.php");
      }
  }

  if(isset($erro) && $erro === true){
    echo "Usuário ou senha inválidos";
  }

?>