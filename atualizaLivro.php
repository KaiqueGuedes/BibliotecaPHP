<?php
    require_once('conexao.php'); 
    
    
     //recupera valores passados pelo método post
     $id = trim($_REQUEST['id']); 
     $nome = trim($_POST['livro']);
     $edi = trim($_POST['editora']);
     $desc = trim($_POST['descri']);
     $gen = trim($_POST['genero']);
     $qtd = trim($_POST['quant']);  
     $aut = trim($_POST['autor']);
   
   
  

    if(!empty($nome) && !empty($edi) && !empty($desc) && !empty($gen) && !empty($qtd) && !empty($aut)){
      $con=open_database(); 
      selectDb();
      $sql = "UPDATE livro set livro='$nome',
              editora='$edi', descri='$desc', genero='$gen', 
              quant='$qtd', autor='$aut'  
              where id='$id';";
      $ins = mysql_query($sql); 
      close_database($con); 
      
      if ($ins==FALSE)
         $msg = "Atualização de livros deu erro..."; 
      else {
         $msg = "Foi alterado" . mysql_affected_rows() . " registros <br/>";
         unset($id, $nome, $edi, $desc, $gen, $qtd, $aut); 
      }
      echo $msg; 
    }
    header("location: listarLivros.php")

    
?>

 