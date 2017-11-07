<?php
     require_once('conexao.php');

     $id = trim($_REQUEST['id']);

     $con = open_database();
     selectDb(); 
     $rs = mysql_query("SELECT * FROM produtos where id=". $id); 
     $row = mysql_fetch_array($rs); 
     close_database($con);
     $desc = $row['descricao']; 
     $uni = $row['unidade']; 
     $qtd = $row['quantidade'];  
     $val = $row['valor'];
?>
<html>
     <head>
        <meta charset="UTF-8">
        <title>Alterar Produtos</title>
    </head>
    <body class="container">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <h1>Alteração de dados de Produto</h1>
        <form id="frmEdPro" name="frmEdPro" method="post" action="edtPro.php">
           <div class="form-group">
              <label for="lblIdt">ID: <?php echo $id?> </label>
              <input type="hidden" name="id" value="<?php echo $id?>"/>
           </div>
           <div class="form-group">
              <label for="lblDesc">Descrição:</label>
              <input type="text" class="form-control" id="txtDesc"
               name="txtDesc" value="<?php echo $desc?>" placeholder="nome do produto...">
           </div>
           <div class="form-group">
              <label for="lblUni">Unidade:</label>
              <input type="text" class="form-control" name="txtUni" 
              id="txtUni"  value="<?php echo $uni?>" placeholder="pct ou lt ou grf, etc..">
           </div>
           <div class="form-group">
              <label for="lblQtd">Quantidade:</label>
              <input type="text" class="form-control" name="txtQtd" 
              id="txtQtd" value="<?php echo $qtd?>" placeholder="informe um valor real">
           </div>
           <div class="form-group">
              <label for="lblVal">Valor:</label>
              <input type="text" class="form-control" name="txtVal" 
              id="txtVal" value="<?php echo $val?>" placeholder="informe um número do tipo real">
           </div>         
           <input name="bt_cad" id="bt_cad" class="btn btn-success" type="submit" value="Gravar"> 
           <input name="bt_voltar" id="bt_voltar" class="btn btn-danger" type="button" value="Voltar"
                 onclick="javascript:location.href='listarProd.php'"> 

        </form>
    </body>   
</html>


