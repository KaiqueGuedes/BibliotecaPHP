<?php
    require_once('conexao.php'); 

     $id = trim($_REQUEST['id']); 

     $con = open_database(); 
     selectDb(); 
     $rs = mysql_query("SELECT * FROM livro where id=". $id); 
     close_database($con);

     $row = mysql_fetch_array($rs); 
     $nome = $row['livro']; 
     $edi = $row['editora'];
     $desc = $row['descri'];
     $gen = $row['genero']; 
     $qtd = $row['quant'];  
     $aut = $row['autor'];
?>

<html>
     <head>
        <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <title>Remover Livros</title>
    </head>
    <body class="container">
        <h1>Remoção de Livro</h1>
        <form id="frmRemLiv" name="frmRemLiv" method="post" action="remLiv.php">
           <div class="form-group">
              <label for="lblId">
                  <span class="textoBold">ID:</span>
                  <span class="textoNormal"><?php echo $id?> </span>
              </label>
              <input type="hidden" name="id" value="<?php echo $id?>"/>
           </div>

           
           <div class="form-group">
              <label for="lblNome">
                  <span class="textoBold">Nome:</span>
                  <span class="textoNormal"><?php echo $nome?> </span>
              </label>
            </div>
            <div class="form-group">
              <label for="lblEdit">
                  <span class="textoBold">Editora:</span>
                  <span class="textoNormal"><?php echo $edi?> </span>
              </label>
            </div>          
           <div class="form-group">
              <label for="lblDesc">
                  <span class="textoBold">Descrição:</span>
                  <span class="textoNormal"><?php echo $desc?> </span>
              </label>
            </div> 
            <div class="form-group">
              <label for="lblGen">
                  <span class="textoBold">Gênero:</span>
                  <span class="textoNormal"><?php echo $gen?> </span>
              </label>
            </div> 
            <div class="form-group">
              <label for="lblQtd">
                  <span class="textoBold">Quantidade:</span>
                  <span class="textoNormal"><?php echo $qtd?> </span>
              </label>
            </div> 
            <div class="form-group">
              <label for="lblAut">
                  <span class="textoBold">Autor:</span>
                  <span class="textoNormal"><?php echo $aut?> </span>
              </label>
            </div>   
            <input name="bt_rem" id="bt_rem" class="btn btn-success" type="submit" value="Remover"> 
            <input name="bt_voltar" id="bt_voltar" class="btn btn-danger" type="button" value="Voltar"
                 onclick="javascript:location.href='listarLivrosB.php'"> 
        </form>
    </body>
 </html>    