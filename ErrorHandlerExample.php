<?php
include "ErrorLogger.php";

class ErrorHandlerExample
{
    public function divide($a,$b)
    {
       try{
        if($b===0){
            $logger=new ErrorLogger('monitoring.log');
                $logger->logException(new Exception("A custom exception occured"));
            throw new Exception("Division by zero is not allowed");
        }
        return $a/$b;
       }catch(Exception $e){

        echo "Error Message: ".$e->getMessage()."\n";
        echo "Error Code: ".$e->getCode()."\n";
        echo "File Info: ".$e->getFile()."\n";
        echo "Line No: ".$e->getLine()."\n";
        print_r($e->getTrace());
        // echo "Errort Trace as string: ". $e->getTraceAsString();
       }
    }
}



$handler= new ErrorHandlerExample();

echo $handler->divide(10,0);