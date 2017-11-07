<?php
$user = trim($_POST['username']);
$pswd = trim($_POST['password']);
$pwdmd5 = md5($pswd);
//echo $user . " - ", $pswd, " - ", $pwdmd5;

require_once("conexao.php");
$con = open_database();
selectDb();
$sql = "SELECT * FROM aluno where ra like '$user'";
$rs = mysql_query($sql);
close_database($con);
$row = mysql_fetch_array($rs);
echo $row['ra'] . " - ". $row['senha'] . "<BR/><br/>";

if(md5($pswd) == $row['senha']){
    session_start(); //INICIALIZA A SESSÃO
    //GRAVA AS VARIÁVEIS NA SESSÃO
    $_SESSION['user'] = $user;
    // $_SESSION['pswd'] = $pswd;
    Header("Location: listarLivros.php"); //REDIRECIONA PARA A PÁGINA QUE VAI EXIBIR OS Livros
}
else Header('Location: index.html');
?>