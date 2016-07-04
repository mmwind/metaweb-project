<?php
	require_once('Engine/DefaultController.php');
	
	class rulesController extends DefaultController {
		
		public function renderView(){
			$this->getEngine()->renderTemplate('rules.html.twig',array());
		}
	} 

?>