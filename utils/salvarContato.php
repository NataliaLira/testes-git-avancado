<?php
  require_once("../config/conn.php");

  $nome = $_REQUEST["nome"];
  $email = $_REQUEST["email"];
  $mensagem = $_REQUEST["mensagem"];

  $sql = "INSERT INTO contatos (nome, email, mensagem) VALUES (:nome, :email, :mensagem)";

  $query = $db->prepare($sql);

  $salvou = $query->execute([
    ":nome" => $nome,
    ":email" => $email,
    ":mensagem" => $mensagem
  ]);

  if(isset($salvou) && $salvou == true){
    echo "Mensagem enviada com sucesso";
  } else { 
    echo "Falha ao processar envio da mensagem";
  }
  
?>