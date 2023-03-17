<?php 
/* Класс обработки ошибок */
namespace TeleBot;
/*
        Коды ошибок
1 - Ошибка SQL запроса
2 - Ошибка отправки запроса в АРКИ
3 - 4 - Ошибка наличия акта

*/
class ErrorLog
{
    private $logFileError;

    public function __construct($errorText)
    {   
        $this->logFileError = "./log/_errorLog_".date('d_m_Y').".txt";
        file_put_contents($this->logFileError, $errorText."\n", FILE_APPEND);
    }

    function __destruct() {
        //print "Уничтожается " . __CLASS__  . "\n";
    }
}