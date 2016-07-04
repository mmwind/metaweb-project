<?php
	require_once('Engine/DefaultController.php');
	
	class mailsController extends DefaultController {
		
                private $mailCategory;
                const MC_IN = 1;
                const MC_OUT = 2;
                const MC_NEW = 3;
                const MC_ALL = 4;
                
                function getMailCategory() {
                    return $this->mailCategory;
                }

                function setMailCategory($mailCategory) {
                    $this->mailCategory = $mailCategory;
                }

                
		public function runController($params = NULL){
			$this->getEngine()->loadCurrentUser();
                        $this->getEngine()->loadMessages();
                        $this->setMailCategory(self::MC_IN);
                        if(isset($_GET['p'])){
                            $p = $_GET['p'];
                            if ($p==1) {
                              $this->setMailCategory(self::MC_IN);  
                            } elseif ($p==2) {
                              $this->setMailCategory(self::MC_OUT);  
                            } elseif ($p==3) {
                              $this->setMailCategory(self::MC_NEW);  
                            } elseif ($p==4){
                              $this->setMailCategory(self::MC_ALL);  
                            }
                        } else {
                            $this->setMailCategory(self::MC_ALL);  
                        }
		}
	
		public function renderView(){
                        $user = $this->getEngine()->getUser();
                        if(!isset($user)){
                            header( 'Location: /', true, 307);
                        } else {
                            $cat = $this->getMailCategory();
                            switch ($cat) {
                                case self::MC_IN:
                                    $params = array('mails' => $this->getEngine()->getIncomingMessages());
                                    break;
                                case self::MC_OUT:
                                    $params = array('mails' => $this->getEngine()->getOutcomingMessages());
                                    break;
                                case self::MC_NEW:
                                    $params = array();
                                    break;
                                case self::MC_ALL:
                                    $params = array('mails' => $this->getEngine()->getMessages());
                                    break;
                                default:
                                    $params = array();
                                    break;
                            }
                            $this->getEngine()->renderTemplate('mails.html.twig',$params);
                        }
		}
	} 

?>