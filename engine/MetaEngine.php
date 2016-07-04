<?php
require_once "/engine/Engine.php";
require_once "/entity/User.php";
require_once "/entity/Message.php";
require_once "/entity/Order.php";

class MetaEngine extends Engine{
	
	public $uid;
        function getUid() {
            return $this->uid;
        }

        function setUid($uid) {
            $this->uid = $uid;
        }

        public $user;
        public $incomingOrders;
        public $outcomingOrders;
        public $messages;
        public $orders;

        
         function getOrders() {
            return $this->orders;
        }

        function setOrders($orders) {
            $this->orders = $orders;
        }
        
        function getIncomingMessages() {
            $allMessages = array();
            foreach ($this->messages as $key => $message) { 
                if($message->getRuid() == $this->getUid()) {
                    $allMessages[] = $message;
                }
            }   
            return($allMessages);         
        }

        function getOutcomingMessages() {
            $allMessages = array();
            foreach ($this->messages as $key => $message) { 
                if($message->getSuid() == $this->getUid()) {
                    $allMessages[] = $message;
                }
            }   
            return($allMessages);         
        }
        
        
        function getIncomingOrders() {
            return $this->incomingOrders;
        }

        function getOutcomingOrders() {
            return $this->outcomingOrders;
        }

        function getMessages() {
            return $this->messages;
        }

        function setIncomingOrders($incomingOrders) {
            $this->incomingOrders = $incomingOrders;
        }

        function setOutcomingOrders($outcomingOrders) {
            $this->outcomingOrders = $outcomingOrders;
        }

        function setMessages($messages) {
            $this->messages = $messages;
        }

   public function setUser($user){
	$this->user=$user;
        $this->setUid($user->uid);
   }
   
   public function getUser(){
	return($this->user);
   }  
 
   
   public function loadUser($userIndex){
    $infoArray = $this->db->getRow('SELECT * FROM `users` WHERE uid = ?i',$userIndex);
    $this->user = new User($infoArray);
    return($this->user);
   }  	
   
   
   public function loadCurrentUser(){
    $infoArray = $this->db->getRow('SELECT * FROM `users` WHERE uid = ?i',$this->uid);
    $this->user = new User($infoArray);
    return($this->user);
   }  	
   
   public function getLiveUsers(){
    $allUsers = array();
    $infoArrays = $this->db->getAll('SELECT * FROM `users` WHERE alive = 1');
    foreach ($infoArrays as $key => $value) {
        $allUsers[] = new User($value);
    }
    return($allUsers);
   }  	   
   
   public function loadMessages(){
    $infoArrays = $this->db->getAll('SELECT * FROM `messages` WHERE ruid = ?i OR suid = ?i', $this->uid, $this->uid);
    foreach ($infoArrays as $key => $value) {
        $message = new Message($value);
        $message->sender = $this->loadUser($message->getSuid());
        $message->reciever = $this->loadUser($message->getRuid());
        $this->messages[] = $message;
    }
   }
   
   public function loadOrders(){
        $infoArrays = $this->db->getAll('SELECT * FROM `orders` WHERE ruid = ?i OR suid = ?i', $this->uid, $this->uid);
        foreach ($infoArrays as $key => $value) {
            $order = new Order($value);
            $order->sender = $this->loadUser($order->getSuid());
            $order->reciever = $this->loadUser($order->getRuid());
            $this->orders[] = $order;
        }
    }
    
 /*   $infoArrays = $this->db->getAll('SELECT * FROM `messages` WHERE ruid = ?i',$this->uid);
    foreach ($infoArrays as $key => $value) { 
        $message = new Message($value);
        $message->sender = $this->loadUser($message->getSuid());
        $message->reciever = $this->loadUser($message->getRuid());
        $this->incomingMessages[] = $message;
    }    
    */
     	
   
 /*  public function getAllMessages(){
    $allMessages = array();
    $infoArrays = $this->db->getAll('SELECT * FROM `messages` WHERE ruid = ?i OR suid = ?i',$this->uid,$this->uid);
    foreach ($infoArrays as $key => $value) { 
        $message = new Message($value);
        $message->sender = $this->loadUser($message->getSuid());
        $message->reciever = $this->loadUser($message->getRuid());
        $allMessages[] = $message;
    }   
    return($allMessages);
   }*/
   
 /*  public function loadOrders(){
    $infoArrays = $this->db->getAll('SELECT * FROM `orders` WHERE suid = ?i',$this->uid);
    foreach ($infoArrays as $key => $value) { 
        $this->outcomingOrders[] = new Order($value);
    }
    $infoArrays = $this->db->getAll('SELECT * FROM `orders` WHERE ruid = ?i',$this->uid);
    foreach ($infoArrays as $key => $value) { 
        $this->incomingOrders[] = new Order($value);
    } */
   
    /*foreach ($this->incomingOrders as $key => $value) { 
        if($value->getStatus()==0){
            
            //UPDATE `orders` SET `closedAt`=[value-7],`status`=[value-8] WHERE ruid = ?i
            
        }
    } 
   }   */ 
   public function storeMessage($message){
       $infoArrays = $this->db->query('INSERT INTO `messages`(`suid`, `ruid`, `text`,`sendedAt`) VALUES (?i,?i,?s,NOW())',
               $message->getSuid(),
               $message->getRuid(),
               $message->getText());
   }
   
   public function placeOrder($newOrder){
       $this->loadCurrentUser();
       $ruid = $newOrder->getRuid();
       $amount = $newOrder->getAmount();
       $currency = $newOrder->getCurrency();
       //$openedAt = $newOrder->getOpenedAt();
       $closedAt = $newOrder->getClosedAt();
       $comment = $newOrder->getComment();

       $sender = $this->getUser();
       $reciever = $this->loadUser($ruid);
       if($sender->getAccountCRD()>=$amount){
           $sender->  setAccountCRD($sender->getAccountCRD()   - $amount);
           $reciever->setAccountCRD($reciever->getAccountCRD() + $amount);
           $infoArrays = $this->db->query('INSERT INTO `orders`(`suid`, `ruid`, `amount`, `currency`, `openedAt`, `closedAt`, `status`,`comment`) VALUES (?i,?i,?s,?s,NOW(),?s,?i,?s)',
               $this->uid,
               $ruid,
               $amount,
               $currency,
               //$openedAt,
               $closedAt,
               0,
               $comment);
           return($this->db->insertId());
       }
       return(-1);
   }
   
  /* public function storeUser($user){
       
       $sqlquery = 'UPDATE `users` SET ?u WHERE ?';
   
	return($this->user);
   } */
		
	public function __construct($createDefaults = true){
		parent::__construct($createDefaults);
		session_start();
		if (isset($_SESSION['id'])) {
			$this->uid = $_SESSION['id'];
			$this->user = $this->loadCurrentUser();
		}
                $this->uid = 2;
    }
} 
?>