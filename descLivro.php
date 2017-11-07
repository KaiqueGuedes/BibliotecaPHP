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

      session_start();
     $ra = $_SESSION['user'];
     echo $ra; 
  

    // $row2 = mysql_fetch_array($rs2);
?>

<html>
     <head>
        <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <title>Descrição Livro</title>
    </head>
    <body class="container">
        <h1>Descrição Livro</h1>
        <form id="descLivro" name="descLivro" method="post" action="atualizaLivro.php">
        <form id="reservaLivro" name="reservaLivro" method="post" action="insReserva.php">
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
              <label for="lblAut">
                  <span class="textoBold">Autor:</span>
                  <span class="textoNormal"><?php echo $aut?> </span>
              </label>
            </div>   

            
            <div class="form-group">
              <label for="lblDesc">
                  <span class="textoBold">Quantidade Disponivel:</span>
                  <span class="textoNormal"><?php echo $qtd?> </span>
              </label>
            </div> 
            

            <div class="form-group">
            <label for="lblDesc">
               <span class="textoBold">Reservar:</span>
              <input type="number" class="form-control" name="txtQtd" 
              id="txtQtd" placeholder="Insira a Quantidade..."
              max="<?php echo $qtd; ?>" value="1"
              >
           </div>


            <input name="bt_Reservar" id="bt_Reservar" class="btn btn-success" type="button" value="Reservar"
            onclick="javascript: location.href='Reservado.php?id=' +
                         <?php echo $row['id']; ?>  
                         + '&aluno=<?php echo $ra ?>'
                         + '&reserva=' + reserva();
                         ">

            <input name="bt_voltar" id="bt_voltar" class="btn btn-danger" type="button" value="Voltar"
                 onclick="javascript:location.href='listarLivros.php'"> 
        </form>


        <script type="text/javascript">
          
          function reserva(){
            var x = document.getElementById('txtQtd').value;
            return x;
          }
        </script>
    </body>
 </html>    