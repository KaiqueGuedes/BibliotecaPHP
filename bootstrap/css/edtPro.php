<?php
    $conexao = mysql_connect("localhost", "root", ""); 
    if (!$conexao){
        echo "Erro ao se conectar no Servidor MySql...";
        exit;
    }
    $banco = mysql_select_db("lp2017"); 
    if (!$banco){
        echo "Eroo ao se conectar com o banco lp2017..."; 
        exit; 
    }
     //recupera valores passados pelo método post
    $id = trim($_POST['id']); 
    $desc  = trim($_POST['txtDesc']);
    $uni = trim($_POST['txtUni']); 
    $qtd = trim($_POST['txtQtd']);
    $val = trim($_POST['txtVal']);

    if(!empty($desc) && !empty($uni) && !empty($qtd) && !empty($val)){
      $sql = "UPDATE produtos set descricao='$desc',
              unidade='$uni', quantidade='$qtd', valor='$val' 
              where id='$id';";
      $ins = mysql_query($sql); 
      if ($ins==FALSE)
         $msg = "Atualização de produtos deu erro..."; 
      else {
         $msg = "Foi alterado" . mysql_affected_rows() . " registros <br/>";
         unset($id, $desc, $uni, $qtd, $val); 
      }
      echo $msg; 
    }
    header("location: listarProd.php")
?>