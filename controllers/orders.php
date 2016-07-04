<?php
	require_once('Engine/DefaultController.php');
	
	class ordersController extends DefaultController {
            
		private $orderCategory;
                const OC_NEW = 0;
                const OC_ALL = 1;
                
                function getOrderCategory() {
                    return $this->orderCategory;
                }

                function setOrderCategory($Category) {
                    $this->orderCategory = $Category;
                }

                
		public function runController($params = NULL){
			$this->getEngine()->loadCurrentUser();
                        $this->getEngine()->loadOrders();
                        if(isset($_GET['p'])){
                            $p = $_GET['p'];
                            if ($p==self::OC_NEW) {
                              $this->setOrderCategory(self::OC_NEW);  
                            } elseif ($p==self::OC_ALL){
                              $this->setOrderCategory(self::OC_ALL);  
                            }
                        } else {
                            $this->setOrderCategory(self::OC_ALL);  
                        }
		}
	
		public function renderView(){
                        $user = $this->getEngine()->getUser();
                        if(!isset($user)){
                            header( 'Location: /', true, 307);
                        } else {
                            $params = array('orders' => $this->getEngine()->getOrders());
                            $this->getEngine()->renderTemplate('orders.html.twig',$params);
                        }
		}
	} 

?>