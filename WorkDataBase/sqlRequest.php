<?php
/* Класс работы с БД */
namespace TeleBot;

use PDO;
use PDOException;

class SqlRequest
{
    private $pdo;

    public function __construct()
    {
        //require_once './DB/config.php';
        $connectionString = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            TG_HOST,
            TG_PORT,
            TG_DATABASE,
            TG_USER,
            TG_PASSWORD
        ); 
        try {
            $this->pdo = new PDO($connectionString);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //$errorProcessing = new ErrorProcessing(1, $e->getMessage());  // Добавить ошибку подключения к БД $e->getMessage()
            new ErrorLog($e->getMessage()); // ошибка выолнения запроса SQL
            //$errorProcessing = null;
            //die($e->getMessage());
        }     
    }
    function __destruct() {
       //print "Уничтожается " . __CLASS__  . "\n";
    }
        /* Метод выполнения запросов */
    private function requestSql($stringRequest)
    {
        try {
            $request = $this->pdo->prepare($stringRequest);
            if ($request->execute()) {
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result);
                return $result;
            }else{
                new ErrorLog("Внутренняя ошибка выполнения SQL запроса: ".$stringRequest); // ошибка выолнения запроса SQL
            }
        } catch (PDOException $e) {

            new ErrorLog($stringRequest."---".$e->getMessage());     // ошибка выолнения запроса SQL
            //die();
        }     
       
    }
    
    public function untitled(){

    }

}