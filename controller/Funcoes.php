<?php
/**
 * Description of Funcoes
 *
 * @author Edson Ricardo Czarneski
 */

class Funcoes{	
	//RECUPERA A DATA E HORA ATUAL
	public function dataAtual($vlr){
		switch($vlr){
			case 1: return date("Y-m-d"); break;
			case 2: return date("Y-m-d H:i:s"); break;	
			case 3: return date("d/m/Y"); break;										
		}
	}
	
	//RESPONSAVEL POR COLOCAR QUALQUER VALOR EM base64
	public function base64($vlt, $n){
		switch($n){
			case 1: return base64_encode($vlt); break;
			case 2; return base64_decode($vlt); break;
		}
	}	
	//VERIFICAR CAMPO VAZIO
	public function verificarCampo($dado){
		return (isset($dado))?($dado):("");
	}
	
}

