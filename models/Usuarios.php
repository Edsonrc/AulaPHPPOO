<?php

include_once 'database/Conexao.php';
include_once 'controller/Funcoes.php';

class Usuarios {
   //ATRIBUTOS
	private $conexao;
	private $objFuncao;
	private $id;
	private $nome;
	private $email;
	private $senha;

	//CONSTRUTOR
	public function __construct(){
		$this->conexao = new Conexao();
		$this->objFuncao = new Funcoes();
	}
	//METODOS MAGICO
	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}

	public function logaUsuario($dados){
		$this->nome = $dados['nome'];
		$this->senha = $dados['senha'];
		try{
			$cst = $this->conexao->conectar()->prepare("SELECT `id`, `nome`, `senha` FROM `usuario` WHERE `nome` = :nome AND `senha` = :senha;");
			$cst->bindParam(':nome', $this->nome, PDO::PARAM_STR);
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();
			if($cst->rowCount() == 0){
				header('location:?login=error');
			}else{
                            //Iniciando sessão e retornando inf. do bd
				session_start();
				$rst = $cst->fetch();
				$_SESSION['logado'] = "sim";
				$_SESSION['user'] = $rst['id'];
				header("location: painel");
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMassage();
		}
	}
        
        public function usuarioLogado($dado){
		$cst = $this->conexao->conectar()->prepare("SELECT `id`, `nome`, `email` FROM `usuario` WHERE `id` = :idUser;");
		$cst->bindParam(':idUser', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['nome'] = $rst['nome'];
	}
        
        public function sairUsuario(){
		session_destroy();
		header ('location:login');
	}

}
