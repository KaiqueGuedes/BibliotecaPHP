<?php
    session_start();
    if(!isset($_SESSION['user']))
    Header("Location: index.html");


     require_once('conexao.php'); 
     $con = open_database();
     selectDb();
     $rs = mysql_query("SELECT * FROM livro;"); 
     close_database($con); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Livros</title>
    </head>
    <body class="container">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="bootstrap/css/style.css" rel="stylesheet">
        <h1>Manter Dados de Livros</h1>
        <br/>
         <input id="bt_ins" class="btn btn-primary" 
             type="button"  value="Novo"
                 onclick="javascript:location.href='inserirLivro.html'">

        <input id="bt_logout" class="btn btn-danger" 
             type="button"  value="Sair"
                 onclick="javascript:location.href='logout.php'">
                 
         <br/>  <br/>
        <div class="row col-md-7">
        <table  class="table table-striped table table-hover">
            <tr>
                 <th>ID</th>
                 <th>Nome</th>
                 <th>Editora</th>
                 <th>Descrição</th>
                 <th>Gênero\Assunto</th>
                 <th>Quantidade</th>
                 <th>Autor</th>
            </tr>
            <?php while ($row = mysql_fetch_array($rs)) { ?>
                <tr>
                   <td><?php echo $row['id'] ?></td>
                   <td><?php echo $row['livro'] ?></td>
                   <td><?php echo $row['editora'] ?></td>
                   <td><?php echo $row['descri'] ?></td>
                   <td><?php echo $row['genero'] ?></td>
                   <td><?php echo $row['quant'] ?></td>
                   <td><?php echo $row['autor'] ?></td>
                   <td>
                      <button type="button" class="btn btn-warning" 
                         onclick="javascript: location.href='frmEdtLiv.php?id=' +
                         <?php echo $row['id'] ?>">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </button>
                   </td>
                   <td>
                      <button type="button" class="btn btn-danger" 
                         onclick="javascript: location.href='frmRemLiv.php?id=' +
                         <?php echo $row['id'] ?>">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                      </button>
                   </td>
                </tr>
            <?php } ?>  
        </table>
     </div>
    </body>
</html>
