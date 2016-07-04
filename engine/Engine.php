<?php
require_once "/vendor/autoload.php";
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Engine {
    public $templatePath = './templates';
    public $cachePath = './cache';
    public $assetsPath = './assets';	
	public $controllersPath = './controllers';	
	
	public $dbopts =  array(
			'host'      => 'localhost',
			'user'    => 'root',
			'pass'    => 'WTECV8naJ6ss5b',
			'db'      => 'meta',
			'charset' => 'utf8'
		);
	
	public $db;
	public $twig;
	public $monolog;
   
   
   public function loadDatabase(){
		$this->db = new SafeMySQL($this->dbopts); // with some of the default settings overwritten
   }
   
   public function loadMonolog(){
	// create a log channel
	$this->monolog = new Logger(static::class);
	$this->monolog->pushHandler(new StreamHandler(static::class.'.log', Logger::WARNING));
   }
   
   public function addLogMessage($message){
	$this->monolog->addWarning($message);
   }
   
   public function setTemplatePath($path){
	$this->templatePath=$path;
   }
   public function getTemplatePath(){
	return($this->templatePath);
   }  

   public function setCachePath($path){
	$this->cachePath=$path;
   }
   public function getCachePath(){
	return($this->cachePath);
   }  
 
   public function setControllersPath($path){
	$this->controllersPath=$path;
   }
   public function getControllersPath(){
	return($this->controllersPath);
   }  
   
   public function getTwig(){
	return($this->twig);
   }  
   
   public function loadTwig(){
        $loader = new Twig_Loader_Filesystem($this->templatePath);
		$this->twig = new Twig_Environment($loader, array(
			'cache' => $this->cachePath,
			'debug' => true,
			'auto_reload' => true
		));
        $this->twig->addExtension(new Twig_Extension_Debug());
        $this->twig->addGlobal('engine', $this);
   }
   
	public function __construct($createDefaults = true){
		if($createDefaults){
			$this->loadTwig();
			$this->loadMonolog();
			$this->loadDatabase();
		}
    }
	
	public function renderTemplate($template,$params = array()){
		$template_code = $this->twig->loadTemplate($template);
		echo $template_code->render($params);
	}
	
	public function renderPage($name){
		require_once($this->getControllersPath().'/'.$name.'.php');
		$class = $name."Controller";
		$controller = new $class($this);
		$controller->runController();
		$controller->renderView();
	}
	
	private function t_renderTemplate($template){
		
	}
} 
?>