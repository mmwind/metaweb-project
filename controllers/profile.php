<?php
	require_once('Engine/DefaultController.php');
	
	class profileController extends DefaultController {
		
		public function runController($params = NULL){
			$this->getEngine()->loadCurrentUser();
		}
	
		public function renderView(){
                        $user = $this->getEngine()->getUser();
                        if(!isset($user)){
                            header( 'Location: /', true, 307);
                        } else {
                            $this->getEngine()->renderTemplate('profile.html.twig');
                        }
		}
	} 

?>