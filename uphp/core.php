<?php
defined("ROOT") or die('Error id#c017416');

class core 
{
    var $_url;
    static $url;

    public function runController($uri)
    {
		$this->_url = $uri;
		self::$url = $uri;
		//this block makes it able to run from root dir. or folder
		$end = explode('\\', ROOT);
		$check = end($end);
		if ($this->_url[0] == $check)
			$arr = array_shift($this->_url);
		// if request_uri after array_shift is empty.. it sets it as index controller
		if(empty($this->_url[0]))
			$this->_url[0] = 'index';

		//check if controller exist
		if (is_file(ROOT . DS . 'application' . DS . 'controllers' . DS . $this->_url[0] . '_controller.php'))
		{
			require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . $this->_url[0] . '_controller.php');
			$cntrl = $this->_url[0];
			$app = new $cntrl;

			//check if Action is not empty
			if(!empty($this->_url[1]))
			{
				$action = $this->_url[1] . '_action';
				if(method_exists($cntrl, $action))
					$app->$action();
				else
				$this->load_404();
			}
			else
			{
				$app->index_action();
			}
		}                
		else
			$this->load_404();
    }
    
    
	//this function when used in controllers returns the current URL
	public static function returnURL()
	{
		return self::$url;
	}
	
	//updates or makesa new $this->key
	public function set($key, $value)
	{
		$this->$key = $value;
	}
    
	/* 
	* $this->view()
	* must keep format.    controllername_view.php             $this->view();
	*                      controllername_vairble_view.php     $this->view('varible');
	* 
	* usage: 
	* 
	* $this->view()  ||   $this->view('string') 
	*      this will load current controller class with ControllerClass_ 'string' _view.php
	*      eg. index_controller
	*      $this->view()       Loads   /view/index/index_view.php
	*      $this->view('help'  Loads   /view/index/index_help_view.php 
	*/
	public function view($str = null)
	{
		if(config::loadLayout)
		{
			if (is_file(ROOT . DS . 'application' . DS . 'layout' . DS . 'header.php'))
				require_once(ROOT . DS . 'application' . DS . 'layout' . DS . 'header.php');      
		}
		if(isset($str))
		{
			if (is_file(ROOT . DS . 'application' . DS . 'view' . DS . $this->_class . DS . $this->_class . '_'.$str . '_view.php'))
				require_once(ROOT . DS . 'application' . DS . 'view' . DS . $this->_class . DS  . $this->_class . '_'.$str . '_view.php');
		}
		else
		{
			if (is_file(ROOT . DS . 'application' . DS . 'view' . DS . $this->_class . DS  . $this->_class . '_view.php'))
				require_once(ROOT . DS . 'application' . DS . 'view' . DS . $this->_class . DS  . $this->_class . '_view.php');
		}
        if(config::loadLayout)
		{
			if (is_file(ROOT . DS . 'application' . DS . 'layout' . DS . 'footer.php'))
				require_once(ROOT . DS . 'application' . DS . 'layout' . DS . 'footer.php');      
		}
    }
	
	/*
	* similar to $this->view()
	* 
	* usage:
	*      
	*      if(true)
	*      {
	*          do something
	*          $this->view();
	*      }
    *      else
	*      {
	*          $this->load_404();
    *      }
	*/
	public function load_404()
	{
		$this->_class = '404';
		$this->view();
	}
	/*
	* only loads functions you need
	* usage:
	*      $this->load_function('test');
	*          loads /uphp/functions/test.php
	*/
	public function load_function($str)
	{
	// check if function exist;
	if (! function_exist($str))
	{
	    if(is_file(ROOT . DS . 'uphp' . DS . 'functions' . DS . $str . '.php'))
	    require_once(ROOT . DS . 'uphp' . DS . 'functions' . DS . $str . '.php');
        }
    }
}