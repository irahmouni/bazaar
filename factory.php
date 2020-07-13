<?php

require_once 'vendor/autoload.php';

use \lbs\bd\ConnectionFactory;
use \lbs\bd\Request;

ConnectionFactory::setConfig('./db.config.ini');

$db = ConnectionFactory::makeConnection();

//add_list($db, ['user_id' => 4, 'titre' => 'Test', 'description' => 'test', 'expiration' => 'NULL', 'token' => 'nosecure4'])

foreach ($st = Request::list_items_with_id($db, 2) as $row) {
	print_r($row); echo '<br>';
}
?>
