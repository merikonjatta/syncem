<?php
header('content-type:text/plain; charset=UTF-8');

require_once('syncem.inc.php');

$config = array(
	'url' => 'http://wayac.uni-kaji.com',
	'username' => 'syncem_bot',
	'password' => trim(file_get_contents('wiki_password.txt')),
	'content_dir' => '/home/marco/sites/wayak/content',
	'files_dir' => '/home/marco/sites/wayak/files',
	'syncstat_file' => dirname(__FILE__).'/__syncstat_wayak',
);

$syncem = new Syncem($config);
$syncem->run();

?>
