<?php
//BUSCANDO AS CLASSES
require_once 'models/Usuarios.php';
//ESTANCIANDO 
$objUser = new Usuarios();
//VALIDANDO USUARIO
session_start();
if($_SESSION["logado"] == "sim"){
	$objUser->usuarioLogado($_SESSION['user']);
}else{
	header("location: /login"); 
}

$sair = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if (isset($sair['sair'])) {
    $objUser->sairUsuario();    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel Administrtivo</title>
        <link rel="stylesheet" href="views/css/estilo.css"/>
    </head>
    <body>
        <nav class="menu">
            <ul>
                <li><a>USUÁRIOS</a></li>
                <li><a>ASSOCIADOS</a></li>
                <li><a>EVENTOS</a></li>
                <li><a>SALÃO SOCIAL</a></li>
                <li><a>ARTIGOS</a></li>
                <li><a>NEWSLETTER</a></li>
                <li><a>RELATÓRIOS</a></li>
                <li><a>SISTEMA</a></li>                
            </ul>
            <div class="status_user">
                <p><img src="views/admin/img/user.png"/>Olá <?=$_SESSION['nome']?>!
               <!-- <a href="#"><img src="views/admin/img/shutdown.png" alt="Deslogar" title="Deslogar"/></a></p>
                 -->  
                <form method="POST" enctype="multipart/form-data">
                    <input type="submit" name="sair" id="sair" value="Sair"/>
                </form>
                    <div>
        </nav>
       
    </body>
</html>
