<?php
require_once "/entity/Entity.php";

class Message extends Entity{

    public $mid;
    public $suid;
    public $ruid;
    public $text;
    public $sendedAt;
    public $viewedAt;
    
    function getMid() {
        return $this->mid;
    }

    function getSuid() {
        return $this->suid;
    }

    function getRuid() {
        return $this->ruid;
    }

    function getText() {
        return $this->text;
    }

    function getSendedAt() {
        return $this->sendedAt;
    }

    function getViewedAt() {
        return $this->viewedAt;
    }

    function setMid($mid) {
        $this->mid = $mid;
    }

    function setSuid($sid) {
        $this->suid = $sid;
    }

    function setRuid($rid) {
        $this->ruid = $rid;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setSendedAt($sendedAt) {
        $this->sendedAt = $sendedAt;
    }

    function setViewedAt($viewedAt) {
        $this->viewedAt = $viewedAt;
    }


}

?>