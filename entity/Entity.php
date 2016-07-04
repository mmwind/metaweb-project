<?php

class Entity {
    public function fillFromArray($array){
		foreach ($array as $key => $value) { 
                                $setter = 'set'.ucfirst($key);
				$this->$setter($value);
		}
    }

    public function __construct($array = NULL){
        if(isset($array)) {
            $this->fillFromArray($array);
        }
    }
}
?>