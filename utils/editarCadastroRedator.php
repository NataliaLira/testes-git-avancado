<?php
  require_once("../config/conn.php");

  $id = $_REQUEST["id"];
  $nome = $_REQUEST["nome"];
  $email = $_REQUEST["email"];
  $senha = $_REQUEST["senha"];

  $sql = "UPDATE usuarios set nome = :nome, email = :email, senha = :senha WHERE id = :id";

  $query = $db->prepare($sql);

  $alterou = $query->execute([
    ":id" => $id,
    ":nome" => $nome,
    ":email" => $email,
    ":senha" => password_hash($senha, PASSWORD_DEFAULT)
  ]); 

  if(isset($alterou) && $alterou == true){
    echo "Cadastrado de usuário alterado com sucesso";
  } else {
    echo "Falha ao processar alteração de cadastro de usuário";
  }
  
?>
