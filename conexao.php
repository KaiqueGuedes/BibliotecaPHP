<?php
function open_database() {
  $conexao = mysql_connect("localhost", "root", ""); 
  if (!$conexao){
      echo "Erro ao se conectar no Servidor MySql...";
      exit;
  }
  return $conexao; 
}

function close_database($conexao) {
    if (!$conexao) {
        echo "Erro ao fechar banco MySql...";
        //exit;   
    }
     mysql_close($conexao);
}

function selectDb(){
  $banco = mysql_select_db("biblioteca"); 
  if (!$banco){
      echo "Erro ao se conectar com o banco biblioteca..."; 
      exit; 
  }
}

?>