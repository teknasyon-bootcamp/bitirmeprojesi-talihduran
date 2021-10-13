<?php

namespace App\Logging;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\LoggerTrait;
class Logger extends AbstractLogger implements LoggerAwareInterface
{
    protected LoggerInterface $logger;

    public function __construct()
    {
        $this->logger = new Logger();
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {

    }

    public function setLogger(LoggerInterface $logger): void
    {
       $this->logger = $logger;
    }
}
