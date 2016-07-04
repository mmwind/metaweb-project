<?php
require_once "/entity/Entity.php";

class Order extends Entity{

    public $oid;
    public $suid;
    public $ruid;
    public $amount;
    public $currency;
    public $openedAt;
    public $closedAt;
    public $status;
    public $comment;

    function getOid() {
        return $this->oid;
    }

    function getSuid() {
        return $this->sid;
    }

    function getRuid() {
        return $this->rid;
    }

    function getAmount() {
        return $this->amount;
    }

    function getCurrency() {
        return $this->currency;
    }

    function getOpenedAt() {
        return $this->openedAt;
    }

    function getClosedAt() {
        return $this->closedAt;
    }

    function getStatus() {
        return $this->status;
    }
   
    function getComment() {
        return $this->comment;
    }
    
    function setOid($oid) {
        $this->oid = $oid;
    }

    function setSuid($sid) {
        $this->sid = $sid;
    }

    function setRuid($rid) {
        $this->rid = $rid;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function setOpenedAt($openedAt) {
        $this->openedAt = $openedAt;
    }

    function setClosedAt($closedAt) {
        $this->closedAt = $closedAt;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setComment($comment){
        $this->comment = $comment;
    }
}

?>