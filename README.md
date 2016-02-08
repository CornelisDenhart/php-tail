# php-tail
Automatically exported from code.google.com/p/php-tail

## Description
This PHP script implements the functionality of "tail -f" available on the Linux shell in PHP using JavaScript and jQuery.
So "tail -f" can be made available in a webserver - browser environment without the need of a ssh connection.

My addition is the ability to access a file of choice as an URL parameter instead of the originally hard coded file.

There is at least another fork of the google's original repository at https://github.com/taktos/php-tail implementing multi-file functionality.

## Usage
* Get PHPTail.php and Log.php and put them your webspace
* Review line 17 of Log.php to define your document root folder
* Upload the 2 files to your webspace
* Access http://MyServer/Log.php?filename=MyFile.txt in your browser

## Tuning
* The default update interval is 1 Second. Review line 35 in PHPtail.php to change this.
* If you like to change the name of 'Log.php', adjust line 229 in PHPtail.php accordingly.

## Caveats
* This application uses jQuery by linking directly to google's servers, which is good for performance but might include privacy issues
* Every update attempt generates a line in apache's log file. This might add unwanted noise for your analyzing tool
