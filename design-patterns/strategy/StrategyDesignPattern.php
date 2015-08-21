<?php
namespace DesignPattern\Strategy;

interface OutPutInterface
{
    public function log();
}

class DatabaseLog implements OutPutInterface
{
    public function log()
    {
        return "Log to Database";
    }
}

class FileSystemLog implements OutPutInterface
{
    public function log()
    {
        return "Log to file system";
    }
}

class WebserviceLog implements OutPutInterface
{
    public function log()
    {
        return "Log to web services";
    }
}

class StrategyClient
{
    protected $output;

    public function setOutput(OutPutInterface $output)
    {
        return $output->log();
    }
}

$object = new StrategyClient();

echo $object->setOutput(new WebserviceLog())."\n";