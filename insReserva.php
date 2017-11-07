<?php
    require_once('conexao.php'); 

    $livNome = trim($_POST['txtLivNome']);
    $alunoRA = trim($_POST['txtRA']);  
    $aluNome  = trim($_POST['txtAluNome']);
    $livQuant = trim($_POST['txtQuant']); 
    if(!empty($livNome) && !empty($alunoRA) && !empty($aluNome) && !empty($gen) && !empty($livQuant)){
      $con = open_database(); 
      selectDb();   
      $sql = "INSERT INTO reserva (livro_livro, aluno_ra, aluno_nome, livro_quant) VALUES  ('$livNome', '$alunoRA', 
      '$aluNome', '$livQuant');";
      $ins = mysql_query($sql); 
      close_database($con); 

      if ($ins==FALSE)
         $msg = "Consulta inserir reservas deu erro..."; 
      else {
         $msg = "Foi inserido" . mysql_affected_rows() . " registros <br/>";
         unset($livNome, $alunoRA, $aluNome, $livQuant); 
      }
      echo $msg; 
    }
    header("location: reserva.php")
?>