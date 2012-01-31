<?php
defined("ROOT") or die('Error');
class setup extends core
{
    function __construct()
    {
        $this->_class = get_class($this);
    }
    
    public function index_action()
    {
        if (!empty($_POST))
        {
            if(!empty($_POST['setup']))
            {
                $_POST['setup'] = preg_replace("/[^a-z]+/", "", strtolower($_POST['setup']));
                $strData = '<?php
defined("ROOT") or die("Error");
class ' . $_POST['setup'] . ' extends core
{
	function __construct()
	{
		$this->_class = get_class($this);
	}

	public function index_action()
	{
		//code here

		$this->view();
	}

}';
        $view_data = 'this if the view file for '. $_POST['setup'].'<br />';
                $dir = ROOT . DS . 'application' . DS . 'view' . DS . $_POST['setup'];
                mkdir($dir);
                $handle = fopen(ROOT . DS . 'application' . DS . 'controllers' .DS .  $_POST['setup'] . '_controller.php','x') or die('controller file already exist');
                fwrite($handle, $strData);
                fclose($handle);
                $fhandle = fopen(ROOT . DS . 'application' . DS . 'view' . DS . $_POST['setup'] . DS . $_POST['setup'] . '_view.php','x') or die('view file already exist');
                fwrite($fhandle, $view_data);
                fclose($fhandle);
                $this->success = '<h1>' . $_POST['setup'] . ' controller and view file were created! </h1><br>';
            }

        }
        $this->view();
    }
    
}