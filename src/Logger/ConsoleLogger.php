<?php

namespace Metro\Logger;

use Metro\Contract\ILogger;

class ConsoleLogger implements ILogger
{

    public function info(string $text)
    {
        $this->log('INFO', $text);
    }

    public function Warning(string $text)
    {
        $this->log('WARNING', $text);
    }

    public function error(string $text)
    {
        $this->log('ERROR', $text);
    }

    protected function log(string $type, string $text)
    {
        echo '['.date('Y-m-d H:i:s')."] {$type}: {$text}\n";
    }
}