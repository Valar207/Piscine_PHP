<?php

class Jaime extends Lannister{
    function sleepWith($param){
        if (get_class($param) == "Tyrion")
            print("Not even if I'm drunk !". PHP_EOL);
        else if (get_class($param) == "Sansa")
            print("Let's do this.". PHP_EOL);
        else if (get_class($param) == "Cersei")
            print("With pleasure, but only in a tower in Winterfell, then.". PHP_EOL);
    }
}

?>