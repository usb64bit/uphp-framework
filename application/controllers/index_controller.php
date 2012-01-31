<?php
class index extends core
{
    function __construct()
    {
		$this->_class = get_class($this);
    }
    
	public function index_action()
	{
		$this->makeUpVarible = 'Hello World';
		$this->view();
	}
}
?>
