<?php
class Conexao {
   private $banco;
   private $servidor;
   private $usuario;
   private $senha;
   private static $pdo;
   //MÃ©todo Construtor
   function __construct() {
       $this->servidor = "localhost";
       $this->banco = "gerenciamento";
       $this->usuario = "root";
       $this->senha = "";
   }
   //MÃ©todo para conexÃ£o
   public function conectar(){
       try {
           if (is_null(self::$pdo)) {
               self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
            }
            return self::$pdo;
       } catch (PDOException $e) {
           echo 'Erro na conexÃ£o. Favor contate o administrador.';
           echo 'CÃ³digo do Erro: '.$e->getMessage();           
       }
   }
   


}


