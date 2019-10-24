<?php

class Tyrion extends Lannister{
    function sleepWith($param){
        if (get_class($param) == "Jaime")
            print("Not even if I'm drunk !". PHP_EOL);
        else if (get_class($param) == "Sansa")
            print("Let's do this.". PHP_EOL);
        else if (get_class($param) == "Cersei")
            print("Not even if I'm drunk !". PHP_EOL);
    }
}

?>