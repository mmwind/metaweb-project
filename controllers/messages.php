<?php
	require_once('Engine/DefaultController.php');
	
	class testController extends DefaultController {
		
		private $name;
		
		public function runController($params = NULL){
			$this->name = $params;
		}
	
		public function renderView(){
			$this->getEngine()->renderTemplate('test.html.twig',array('name' => $this->name));
		}
	} 

?>