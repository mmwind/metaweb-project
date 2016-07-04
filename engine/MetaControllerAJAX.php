<?php
require_once('Engine/MetaController.php');

class MetaControllerAjax extends MetaController {

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
      //  echo '{}';	
    }
	
} 
?>