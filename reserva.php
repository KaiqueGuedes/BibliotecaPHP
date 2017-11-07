<?php

require_once('conexao.php');
$con = open_database();
selectDb();
$rs = mysql_query("select aluno_ra,livro_id,data_empre,data_devo,quant from emprestimo;");
close_database($con);
?>

<html>
<head>
    <meta charset="UTF-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <title>Livros Reservados</title>
</head>
<body class="container">
    <h1>Livros Reservados</h1>
     <form id="reservaLivro" name="reservaLivro" method="post" action="atuLivro.php">
    <br> <br>
    <div class="row col-md-7">
    <table  class="table table-striped table table-hover">
        <tr>
             <th>RA</th>
             <th>Livro</th>
             <th>Data Emprestimo</th>
             <th>Data Devolução</th>
             <th>Qtd</th>
            
        </tr>
        <?php while ($row = mysql_fetch_array($rs)) { ?>
                <tr>
                   <td><?php 
                        echo $row['aluno_ra'];
                        $ra = $row['aluno_ra'];
                   ?></td>
                   <td><?php 
                        echo $row['livro_id'];
                        $livro = $row['livro_id'];
                   ?></td>
                   <td><?php echo $row['data_empre'] ?></td>
                   <td><?php echo $row['data_devo'] ?></td>
                   <td><?php echo $row['quant'] ?></td>
                   
                <td>
                      <input name="bt_confirmar" id="bt_confirmar" class="btn btn-success" type="button" value="Confirmar"
                         onclick="javascript:location.href='baixaEstoque.php?ra=' +
                         <?php echo $ra ?> + '&livro=' +  <?php echo $livro ?>">
                         
                   </td>
                </tr>
            <?php } ?>  
        </table>

        <a href="ManterLivro.php"  class="btn btn-warning">Voltar</a> 
    </body>
</html>