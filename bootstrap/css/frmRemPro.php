<?php
     require_once('conexao.php');

     $id = trim($_REQUEST['id']);

     $con = open_database();
     selectDb(); 
     $rs = mysql_query("SELECT * FROM produtos where id=". $id);  
     close_database($con);

     $row = mysql_fetch_array($rs);
     $desc = $row['descricao']; 
     $uni = $row['unidade']; 
     $qtd = $row['quantidade'];  
     $val = $row['valor'];
?>

<html>
     <head>
        <meta charset="UTF-8">
        <title>Remover Produtos</title>
    </head>
    <body class="container">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <h1>Remoção de Produto</h1>
    </body>
</html>    
        