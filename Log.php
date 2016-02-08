<?php
/**
 * Require the library
 */
require 'PHPTail.php';
/**
 * Initilize a new instance of PHPTail
 * @var PHPTail
 */

# Intended invocation: http://MyServer/Log.php?filename=MyFile.txt
if(isset($_GET['filename']))  
{
	# Enter your desired document root folder here. You might want to use a dedicated folder for security reasons
	# as the visitor can enter and access arbitrary files. Leave $basefolder empty and you can access any file on
	# the server, sufficent read rights for apache assumed.
	$basefolder = "/var/www/MyStuff";
	
	# i.e. http://MyServer/Log.php?filename=var/log/apache2/access.log
	#$basefolder = "";
	
	# this is application specific, just to be taken as an example. 
	# Above URL will be epanded so accessed file will be '/var/www/MyStuff/2016/02/07/MyFile.txt', assuming your local date is 2016-02-07
	# $basefolder = $basefolder."/".date("Y/m/d");
	
	$actualfilename = $basefolder."/".$_GET['filename'];
	
	# requested file has to exist and be accessible & to be a regular file
	if (file_exists($actualfilename) && (filetype($actualfilename) == "file")) 
	{
		$tail = new PHPTail($basefolder, $_GET['filename']);
		
		/**
		 * We're getting an AJAX call
		 */
		if(isset($_GET['ajax']))
		{
			echo $tail->getNewLines($_GET['lastsize'], $_GET['grep'], $_GET['invert']);
			die();
		}
		/**
		 * Regular GET/POST call, print out the GUI
		 */
		$tail->generateGUI();
	} else {
		die("Error: File '".$actualfilename."' does not exist.");
	}
} else {
	die("Error: No filename given.");
}
?>
