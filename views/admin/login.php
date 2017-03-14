<?php
//BUSCANDO AS CLASSES
require_once 'models/Usuarios.php';
//ESTANCIANDO A CLASSES
$objUser = new Usuarios;
//FAZENDO O LOGIN
$btLogar = filter_input_array(INPUT_POST,FILTER_DEFAULT);       
if(isset($btLogar['btLogar'])){
	$objUser->logaUsuario($btLogar);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel de Gerenciamento Administrativo</title>
        <link rel="shortcut icon" href="favicon.png" /> 
        <link rel="stylesheet" href="views/css/estilo.css" type="text/css" /> 
    </head>
    <body>
        <div id="areaLogin">
    	<form action="" method="post">
            <h1>Painel Administativo</h1>
        	<div class="form-group">
            	<div class="input-group">
                    <p><span class="input-group-addon">Usuário</span></p>
                    <p><input type="text" name="nome" class="form-control" required="required"></p>
              	</div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <p><span class="input-group-addon">Senha:</span></p>
                    <p><input type="password" name="senha" class="form-control"></p>
                </div> 
            </div>
            <div class="form-group">
            	<button type="submit" name="btLogar" class="btn">Entrar</button>
                <button type="reset" name="btLimpar" class="btn btn_corrigir">Corrigir</button>
            </div>
            <a href="#">Esqueci minha senha</a>
        </form>
            
        <?php 
        $erro = filter_input_array(INPUT_GET, FILTER_DEFAULT);        
        if($erro["login"] == "error"){ ?>
        <div class="alert" role="alert"><br>Ops! E-mail ou Senha Inválidos.</div>
        <?php } ?>        
    </body>
</html>

