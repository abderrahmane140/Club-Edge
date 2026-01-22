<?php

namespace Src\Services;


class Logger
{

    private $fileLog;
    private $display=true; //hna wx show them or no

public function __construct()
{
    $this->fileLog = $_ENV['ROOT'].'error.log';
    error_reporting(E_ALL);
    ini_set('display_errors', $this->display ? '1' : '0');
    ini_set('display_startup_errors', $this->display ? '1' : '0');
    ini_set('log_errors', '1');
    ini_set('error_log', $this->fileLog);

}
    public static function errorIt($msg)
    {
        self::log('ERROR',$msg);
    }

    public static function infoIt($msg)
    {
        self::log('INFO',$msg);
    }

    public function log($type,$error){
        $line = date('Y-m-d H:i:s') . "[$type]". $error . PHP_EOL;
        file_put_contents($this->fileLog,$line,FILE_APPEND );
    }


}