<?php
    require_once('conexao.php'); 

     $id = trim($_REQUEST['id']); 

     $con = open_database(); 
     selectDb(); 
     $rs = mysql_query("SELECT * FROM livro where id=". $id); 
     close_database($con);

$row = mysql_fetch_array($rs); 
     $liv = $row['livro']; 
     $edi = $row['editora'];
     $desc = $row['descri'];
     $gen = $row['genero']; 
     $qtd = $row['quant'];  
     $aut = $row['autor'];
?>
<html>
     <head>
        <meta charset="UTF-8">
        <title>Alterar Livro</title>
    </head>
    <body class="container">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <h1>Alteração de dados do Livro</h1>
        <form id="frmEdtLiv" name="frmEdtLiv" method="post" action="edtLiv.php">
        <div class="form-group">
              <label for="lblId">ID: <?php echo $id?> </label>
              <input type="hidden" name="id" value="<?php echo $id?>"/>
           <div class="form-group">
              <label for="lblLiv">Livro:</label>
              <input type="text" class="form-control" name="txtLiv"
               id="txtLiv" value="<?php echo $liv?>" placeholder="Nome do Livro...">
           </div>
           
           <div class="form-group">
              <label for="lblEdi">Editora:</label>
              <input type="text" class="form-control" name="txtEdi" 
              id="txtEdi"  value="<?php echo $edi?>" placeholder="Editora Responsável..">
           </div>
          
           <div class="form-group">
              <label for="lblDesc">Descrição:</label>
              <input type="text" class="form-control" name="txtDesc" 
              id="txtDesc" value="<?php echo $desc?>" placeholder="Descrição do Livro...">
           </div>
           <div class="form-group">
              <label for="lblGen">Gênero:</label>
              <input type="text" class="form-control" name="txtGen" 
              id="txtGen" value="<?php echo $gen?>" placeholder="Gênero do Livro...">
           </div>
           <div class="form-group">
              <label for="lblQtd">Quantidade:</label>
              <input type="text" class="form-control" name="txtQtd" 
              id="txtQtd" value="<?php echo $qtd?>" placeholder="Quantidade Disponível...">
           </div>
           <div class="form-group">
              <label for="lblAut">Autor:</label>
              <input type="text" class="form-control" name="txtAut" 
              id="txtAut" value="<?php echo $aut?>" placeholder="Autor do Livro...">
           </div>   
                 
           
           <input name="bt_ed" id="bt_ed" class="btn btn-success" type="submit" value="Gravar"> 
           <input name="bt_voltar" id="bt_voltar" class="btn btn-danger" type="button" value="Voltar"
                 onclick="javascript:location.href='listarLivrosB.php'"> 

        </form>
    </body>   
</html>
