<?php
require_once "/entity/Entity.php";

class User extends Entity{
    
    private $uid;
    private $firstname;
    private $lastname;
    private $alias;
    private $company;
    private $position;
    private $accesslevel;
    private $accessstatus;
    private $info;
    private $sex;
    private $age;
    private $father;
    private $mother;
    private $relatives;
    private $accountCRD;
    private $birthdate;
    private $photo_url;
    private $alive;
    
    function getAlive() {
        return $this->alive;
    }

    function setAlive($alive) {
        $this->alive = $alive;
    }

        
    public function getInfo() {
        return $this->info;
    }

    public function setInfo($info) {
        $this->info = $info;
    }

    public function getUid() {
        return $this->uid;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getAccesslevel() {
        return $this->accesslevel;
    }

    public function getAccessstatus() {
        return $this->accessstatus;
    }

    public function getSex() {
        return $this->sex;
    }

    public function getAge() {
        return $this->age;
    }

    public function getFather() {
        return $this->father;
    }

    public function getMother() {
        return $this->mother;
    }

    public function getRelatives() {
        return $this->relatives;
    }

    public function getAccountCRD() {
        return $this->accountCRD;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getPhoto_url() {
        return $this->photo_url;
    }

    public function setUid($uid) {
        $this->uid = $uid;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function setAccesslevel($accesslevel) {
        $this->accesslevel = $accesslevel;
    }

    public function setAccessstatus($accessstatus) {
        $this->accessstatus = $accessstatus;
    }

    public function setSex($sex) {
        $this->sex = $sex;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setFather($father) {
        $this->father = $father;
    }

    public function setMother($mother) {
        $this->mother = $mother;
    }

    public function setRelatives($relatives) {
        $this->relatives = $relatives;
    }

    public function setAccountCRD($accountCRD) {
        $this->accountCRD = $accountCRD;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    public function setPhoto_url($photo_url) {
        $this->photo_url = $photo_url;
    }

    }

?>