<?php
    require_once('conexao.php'); 

    $nome = trim($_POST['txtNome']);
    $edi = trim($_POST['txtEdi']);  
    $desc  = trim($_POST['txtDesc']);
    $gen = trim($_POST['txtGen']); 
    $qtd = trim($_POST['txtQtd']);
    $aut = trim($_POST['txtAut']);
    if(!empty($nome) && !empty($edi) && !empty($desc) && !empty($gen) && !empty($qtd) && !empty($aut)){
      $con = open_database(); 
      selectDb();   
      $sql = "INSERT INTO livro (livro, editora, descri, genero, quant, autor) VALUES  ('$nome', '$edi', '$desc', '$gen', '$qtd', '$aut');";
      $ins = mysql_query($sql); 
      close_database($con); 

      if ($ins==FALSE)
         $msg = "Consulta inserir livros deu erro..."; 
      else {
         $msg = "Foi inserido" . mysql_affected_rows() . " registros <br/>";
         unset($nome, $edi, $desc, $gen, $qtd, $aut); 
      }
      echo $msg; 
    }
    header("location: listarLivrosB.php")
?>