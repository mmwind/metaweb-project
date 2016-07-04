<?php
require_once('Engine/Controller.php');

class DefaultController implements Controller {

	private $engine;
	
	public function __construct($engine = NULL){
		$this->setEngine($engine);
	}
	
	
    public function setEngine($engine){
		$this->engine = $engine;
                $engine->getTwig()->addGlobal('controller', $this);
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