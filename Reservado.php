
<?php
    require_once('conexao.php'); 

    $id = trim($_GET['id']);
    $ra = trim($_GET['aluno']);
    $reserva = trim($_GET['reserva']);

   /* echo "Livro ID: $id <br>";
    echo "RA: $ra <br>";
    echo "Qtd. Reservada: $reserva <br>"; */


     $con = open_database(); 
     selectDb(); 
     $sql = "INSERT INTO emprestimo (data_empre, data_devo, aluno_ra, livro_id, quant) VALUES ";
     $sql .= "(now(), now(), $ra, $id, $reserva)";
     $rs = mysql_query($sql);

     if(!$rs){
        echo "ERRO!!!";
     }else{

        /* SE O LIVRO FOI RESERVADO È NECESSARIO ALTER A QUANTIDADE DELE NO ESTOQUE */
        $sql = "UPDATE livro SET quant=quant-$reserva WHERE id=$id";
         $rs = mysql_query($sql);
         if(!$rs){
            die("ERRO!!!");
         }
     }
     close_database($con);
?>
<html>
     <head>
        <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <title>Confirmação De Reserva</title>
    </head>
    <body class="container">
        <h1>Reserva Concluida Com Sucesso!</h1>
        
           
              <input type="hidden" name="id" value="<?php echo $id?>"/>
          
           
            <input name="bt_rem" id="bt_rem" class="btn btn-success" type="submit"
            onclick="javascript: location.href='listarLivros.php'" value="Buscar Mais Livros"> 

            <input name="bt_voltar" id="bt_voltar" class="btn btn-danger" type="button" value="Voltar"
                onclick="javascript: location.href='descLivro.php?id=' +
                         <?php echo $id ?>"> 
      
    </body>
 </html>    