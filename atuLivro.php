<?php
    require_once('conexao.php');      
    
    $livQuant = trim($_POST['txtQuant']); 
    
    if( !empty($livQuant)){
      $con = open_database(); 
      selectDb();   
      $sql = "UPDATE livro set livro (livro_quant) VALUES  ( '$livQuant');";
      $ins = mysql_query($sql); 
      close_database($con); 

      if ($ins==FALSE)
         $msg = "Consulta inserir reservas deu erro..."; 
      else {
         $msg = "Foi inserido" . mysql_affected_rows() . " registros <br/>";
         unset($livQuant); 
      }
      echo $msg; 
    }
    header("location: reserva.php")
?>