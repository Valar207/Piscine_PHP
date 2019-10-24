<?php

class NightsWatch
{
    public $garde;

    public function recruit($person){
        if ($person instanceof IFighter)
            $this->garde[] = $person;
    }
    public function fight(){
        foreach($this->garde as $v){
            $v->fight();
        }
    }
}

?>