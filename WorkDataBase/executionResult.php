<?php 

namespace TeleBot;

class ExecutionResult
{
    private $logFileOK;

    public function __construct($textSuccess)
    {
        $this->logFileOK = "./log/succesLog_".date('d_m_Y').".txt";

        file_put_contents($this->logFileOK, "$textSuccess \n", FILE_APPEND);
    }
    function __destruct() {
        //print "Уничтожается " . __CLASS__  . "\n";
    }
}