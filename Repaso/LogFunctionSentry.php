<?php
class LogFunctionSentry{
    static public function Log(Ilog $log, $error){
        $date= date("Y-m-d H:i:s");
        $message = $log->printError($error);
        $trace = $log->printTrace($error);
        $logFile = fopen('./log.txt','a');
        fwrite($logFile,"[$date] $message: $trace\n",1000);
    }
}