<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

define('DB_HOST', 'localhost');
define('DB_USER', 'adas');
define('DB_PW', '111111');
define('DB_NAME', 'adas');
define('LIST_NUM_FOR_PAGE', 10);

class GlobalPath
{
	public $ROOT;
	public $INC;
	public $CSS;
	public $JS;
	public $FUNC;
	public $HOST;
	public $WEBROOT;
	public $WEB_CSS;
	public $WEB_JS;
	public $PAGE_SELF;

	function __construct($root, $webroot)
	{
		$this -> ROOT      = $root.'/';
		$this -> INC       = $this -> ROOT.'inc/';
		$this -> CSS       = $this -> ROOT.'css/';
		$this -> JS        = $this -> ROOT.'js/';
		$this -> FUNC      = $this -> ROOT.'func/';
		$this -> WEBROOT   = $webroot;
		$this -> WEB_CSS   = $this -> WEBROOT.'css/';
		$this -> WEB_JS    = $this -> WEBROOT.'js/';
		$this -> PAGE_SELF = $_SERVER['PHP_SELF'];
	}
	public function getFileName()
	{
		$name = $this -> PAGE_SELF;
		preg_match('/(\w.+)(\.[^.]*)$/', $name, $maches);
		$name = $maches[1];

		return $name;
	}
	public function getDirName()
	{
		$name = $this -> PAGE_SELF;
		$dir = dirname($name);
		preg_match('/(?<=\/)[\w.]+$/', $dir, $matches);

		return $matches[0];
	}
};
?>