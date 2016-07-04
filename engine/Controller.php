<?php

interface Controller
{
	//private $engine;
    public function setEngine($engine);
	public function getEngine();
	public function runController($params);
    public function renderView();
}

?>