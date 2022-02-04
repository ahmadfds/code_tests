<?php

namespace Metro\Contract;

interface ILogger
{
    public function info(string $text);

    public function Warning(string $text);

    public function error(string $text);
}