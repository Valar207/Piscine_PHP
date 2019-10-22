<?php

class Exemple
{
    public $pubfoo = 0;
    private $privfoo = 'hello';

    function __construct(){
        print('Constructor called'. PHP_EOL);
        print('$this->pubfoo ' . $this->pubfoo . PHP_EOL);
        $this->pubfoo = 42;
        print('$this->pubfoo ' . $this->pubfoo . PHP_EOL);

        print('$this->privfoo ' . $this->privfoo . PHP_EOL);
        $this->privfoo = 'world';
        print('$this->privfoo ' . $this->privfoo . PHP_EOL);
        
        $this->publicBar();
        $this->privateBar();
        return;
    }
    
    function __destruct(){
        print('Destructor called'. PHP_EOL);
        return;
    }
    
    function publicBar(){
        print('Method publicBar called'. PHP_EOL);
        return;
    }

    private function privateBar(){
        print('Method privateBar called'. PHP_EOL);
        return;
    }
}

$instance = new Exemple();

print('$this->pubfoo ' . $instance->pubfoo . PHP_EOL);
$instance->pubfoo = 100;
print('$this->pubfoo ' . $instance->pubfoo . PHP_EOL);

$instance->publicBar();
/*
print('$this->privfoo ' . $instance->privfoo . PHP_EOL);
$instance->privfoo = 'NOOOOOOOOO';
print('$this->privfoo ' . $instance->privfoo . PHP_EOL);*/


?>