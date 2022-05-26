<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
$factory = (new Factory)->withServiceAccount('Db.json')
->withDatabaseUri('https://sistem-enginering-default-rtdb.asia-southeast1.firebasedatabase.app/');;

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>