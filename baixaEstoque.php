<?php
	require_once('conexao.php'); 

	$ra = $_GET['ra'];
	$li = $_GET['livro'];

	//echo "$ra, $li";

     $con = open_database();
     selectDb();

     /* O COMANDO SELECIONA O RA DO ALUNO E ID DO LIVRO EMPRESTADO */
     $rs = mysql_query("SELECT * FROM emprestimo WHERE aluno_ra=$ra AND livro_id=$li"); 
      
      if($rs){
      		$row = mysql_fetch_array($rs);
	      	/* 
	      	BOM JA QUE VAMO DAR BAIXA A PRIMEIRA COISA A FAZER É RETORNAR A
			QUANTIDADE QUE ESTAVA RESERVADA PARA O ESTOQUE
	      	*/
			$qtd = $row['quant']; // PRONTO... AGORA A QUANTIDADE TA GUARDADA NUMA VARIAVEL

      }else{

      	die("ERRO!"); // se o comando der errado o resto do programa é interrompido

      }

         
	// AGORA É HORA DE DELETAR ESSA LINHA DA TABELA EMPRESTIMO
	// POIS NAO HÁ MAIS NECESSIDADE DE ELA EXISTIR
	/* O COMANDO DELETA O REGISTRO ONDE ESTA O RA DO ALUNO E ID DO LIVRO EMPRESTADO */
	$rs = mysql_query("DELETE FROM emprestimo WHERE aluno_ra=$ra AND livro_id=$li");
	if(!$rs){
		die("ERRO!"); // se o comando der errado o resto do programa é interrompido
	}

	// AGORA É HORA DE RETORNAR A QUANTIDADE PARA O ESTOQUE 

	/* ESTE COMANDO SOMA A QUANTIDADE ATUAL DO LIVRO COM A QUANTIDADE QUE FOI RESERVADA*/
	$rs = mysql_query("UPDATE livro SET quant=quant+$qtd WHERE id=$li");

	if($rs){
		
		echo "O LIVRO FOI DEVOLVIDO COM SUCESSO!";
		
		// AQUI VC PODERA REDICIONAR PARA A PAGINA QUE VC DESEJA Exemplo:
		header("location: listarLivrosB.php");

	}else{
		echo "ERRO!!!";
	}

	close_database($con);
?>