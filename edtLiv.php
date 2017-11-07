<?php
    require_once('conexao.php'); 

     //recupera valores passados pelo método post
    $id = trim($_POST['id']);
    $liv  = trim($_POST['txtLiv']);
    $edi  = trim($_POST['txtEdi']); 
    $desc  = trim($_POST['txtDesc']);
    $gen = trim($_POST['txtGen']); 
    $qtd = trim($_POST['txtQtd']);
    $aut = trim($_POST['txtAut']);

    if(!empty($liv) && !empty($edi) && !empty($desc) && !empty($gen) && !empty($qtd) && !empty($aut)){
      $con=open_database(); 
      selectDb();
      $sql = "UPDATE livro set livro='$liv',
              editora='$edi', descri='$desc', genero='$gen', 
              quant='$qtd', autor='$aut'  
              where id='$id';";
      $ins = mysql_query($sql); 
      close_database($con); 
      
      if ($ins==FALSE)
         $msg = "Atualização de livros deu erro..."; 
      else {
         $msg = "Foi alterado" . mysql_affected_rows() . " registros <br/>";
         unset($id, $liv, $edi, $desc, $gen, $qtd, $aut); 
      }
      echo $msg; 
    }
    header("location: listarLivrosB.php")
?>