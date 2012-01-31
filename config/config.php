<?php
defined("ROOT") or die('Error id#c017416');
class config
{
	//Development mode: 1     production: 0;
	const dev	= 1;

	// if index.php is running in the very root folder e.g. www.example.com/ 
	//      leave as '/';
	// elseif index.php is running in a folder e.g. www.example.com/myApp/
	//      leave as 'myApp';
	const directory      = 'uphp'; 

	/* full path. mainly for img src="path" type of deal
	 * example: http://localhost/
	 * or if in production mode http://www.example.com/ 
	 * in view files you can use <?php echo PATH; ?>
	 */
	const path          = 'http://johnkonet/';
	
	const db_host		= 'localhost';
	const db_user		= 'user';
	const db_pass		= 'password';
	const db_name		= 'database';
	
	const local_host	= 'localhost';
	const local_user	= 'user';
	const local_pass	= 'password';
	const local_name	= 'database';
	
	//loadLayout: 1 to use layout header and layout footer. 
	//called in core.php function load_view();
	const loadLayout   = 1;

	const userLimit    = 6;

	const productLimit = 6;

	const loadMore     = 4;



	//feel free to add your own custom settings;

}