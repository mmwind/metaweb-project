<?php
require_once('Engine/DefaultController.php');

class MetaController extends DefaultController {

	private $engine;
	
	public function __construct($engine = NULL){
		$this->setEngine($engine);
	}
	
	
    public function setEngine($engine){
		$this->engine = $engine;
	}

    public function getEngine(){
		return($this->engine);
	}
	
	
    public function runController($params = NULL){
	
	}
	
    public function renderView(){
	
        
    }
	
} 
?>