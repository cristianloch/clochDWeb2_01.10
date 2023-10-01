<?php

class Connection{

    private static $conn = null; //classe estatica nao pode gerar objeto, pq pertence a classe. 

    public static function getConnection(){
        if(self::$conn == null){
            //Criar conexão
            $opcoes = array(
                //Define o charset da conexão
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                //Define o tipo do erro como exceção
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
               //Define o retorno das consultas como
               //array associativo (campo => valor)
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
               );

            self::$conn = new PDO("mysql:host=localhost;dbname=produto",
                "root", "", $opcoes); //usuario root e senha em branco
        }

        return self::$conn; //para retornar da classe (do objeto é return this)
    }

}

//$conn = Connection::getConnection();
//print_r($conn);

?>