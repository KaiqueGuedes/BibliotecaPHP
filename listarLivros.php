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
        <title>Livros Disponiveis</title>
    </head>
    <body class="container">
        <body background="data:image/jpeg;base64,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">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="bootstrap/css/style.css" rel="stylesheet">
        <h1>Livros Disponiveis</h1>
        <br/>
         <input id="bt_ins" class="btn btn-primary" 
             type="button"  value="Sair"
                 onclick="javascript:location.href='index.html'">

        
                 
         <br/>  <br/>
        <div class="row col-md-7">
        <table  class="table table-striped table table-hover">
            <tr>
                 <th>ID</th>
                 <th>Nome</th>
                 <th>Editora</th>
                 <th>Gênero\Assunto</th>
                 <th>Quantidade</th>
                 <th>Autor</th>
            </tr>
            <?php while ($row = mysql_fetch_array($rs)) { ?>
                <tr>
                   <td><?php echo $row['id'] ?></td>
                   <td><?php echo $row['livro'] ?></td>
                   <td><?php echo $row['editora'] ?></td>
                   <td><?php echo $row['genero'] ?></td>
                   <td><?php echo $row['quant'] ?></td>
                   <td><?php echo $row['autor'] ?></td>
                 
                   <td>
                      <button type="button" class="btn btn-success"
                         onclick="javascript: location.href='descLivro.php?id=' +
                         <?php echo $row['id'] ?>">+
                      </button>
                      </td>
                </tr>
            <?php } ?>  
        </table>
     </div>
    </body>
</html>
