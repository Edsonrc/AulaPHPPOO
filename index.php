<?php
	$inicio = (isset($_GET['pg'])) ? $_GET['pg'] : 'login';
	$diretorio = 'views/admin';
	$url = "http://localhost/Painel_Administrativo/";
	$paginasPermitidas = array ('login','erro','painel');

		if(substr_count($inicio,"/") > 0){
			 $inicio = explode("/",$inicio);
			 $pg = (file_exists("{$diretorio}/".$inicio[0].'.php')) ? $inicio[0] : 'erro';
		     $id = $inicio[1];
		}else{
			 $pg = (file_exists("{$diretorio}/".$inicio.'.php')) ? $inicio : 'erro';
			 $id = 0;
		}

		require ("{$diretorio}/{$pg}.php");




