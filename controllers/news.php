<?php
	require_once('Engine/DefaultController.php');
	
	class newsController extends DefaultController {
		
		public function renderView(){
			$this->getEngine()->renderTemplate('news.html.twig',array());
		}
	} 

?>