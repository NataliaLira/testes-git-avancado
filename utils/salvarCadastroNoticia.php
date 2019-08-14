<?php
  require_once("../config/conn.php");

  $titulo = $_REQUEST["titulo"];
  $descricao = $_REQUEST["descricao"];

  if ($_FILES) {
    if($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
      $nomeImg = $_FILES["imagem"]["name"];
      $nomeTemp = $_FILES["imagem"]["tmp_name"];
      // caminho até pasta atual => pasta utils
      $caminho = dirname(__FILE__);
      // caminho onde desejamos inserir nossos uploads
      $caminhoDesejado = "assets/img/uploads/";

      // caminho definitivo onde iremos armazenar os uploads
      $caminhoDefinitivo = str_replace("utils", $caminhoDesejado, $caminho);

      // obtendo caminho e imagem que foi feito uploads
      $caminhoCompleto = $caminhoDefinitivo . $nomeImg;

      // movendo imagem para pasta uploads
      $moveu = move_uploaded_file($nomeTemp, $caminhoCompleto);
    }
  }

  $sql = "INSERT INTO noticias (titulo, imagem, descricao, data_criacao, data_atualizacao) 
  values (:titulo, :imagem, :descricao, NOW(), NOW())";

  $query = $db->prepare($sql);

  $salvou = $query->execute([
    ":titulo" => $titulo,
    ":imagem" => $caminhoDesejado.$nomeImg,
    ":descricao" => $descricao
  ]); 

  if(isset($salvou) && $salvou == true){
    echo "Notícia cadastrada com sucesso";
  } else {
    echo "Falha ao processar cadastro de notícia";
  }
  
?>
