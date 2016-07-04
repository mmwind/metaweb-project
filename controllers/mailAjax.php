<?php
	require_once('Engine/MetaControllerAJAX.php');
	
	class mailAjaxController extends MetaControllerAJAX {
		private $to;
                private $text;
                private $status;
                
                function getTo() {
                    return $this->to;
                }

                function getText() {
                    return $this->text;
                }

                function setTo($to) {
                    $this->to = $to;
                }

                function setText($text) {
                    $this->text = $text;
                }
                function getStatus() {
                    return $this->status;
                }

                function setStatus($status) {
                    $this->status = $status;
                }

                public function runController($params = NULL){
			if(isset($_POST["reciever"]) && isset($_POST["text"])){
                           $this->setTo($_POST["reciever"]);                     
                           $this->setText($_POST["text"]);  
                           
                           $user = $this->getEngine()->getUser();
                           if(!isset($user)){
                                header("HTTP/1.0 404 Not Found");
                            } else {
                            $value->suid = $user->getUid();
                            $value->ruid = $this->getTo();
                            $value->text = $this->getText();
                            $m = new Message($value);    
                            $this->getEngine()->storeMessage($m);   
                            //echo "{result:$data}";
                            //$this->getEngine()->renderTemplate('mails.html.twig',$params);
                            }
                        } else {
                            
                            header("HTTP/1.0 404 Not Found");
                        }
		}
	
		public function renderView(){
                    $data = serialize($_POST);
                        $user = $this->getEngine()->getUser();
                        if(!isset($user)){
                          header("HTTP/1.0 404 Not Found");
                        } else {
                            echo "{result:$data}";
                            //$this->getEngine()->renderTemplate('mails.html.twig',$params);
                        }
		}
	} 

?>