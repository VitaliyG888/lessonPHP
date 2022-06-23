<?php

use appTelegram\{FileStorage, Text};

error_reporting(-1);

require_once __DIR__ . '/vendor/autoload.php';

$testObj = new FileStorage();
$storeObj = new Text('Jon Smite', 'test.txt');
$testObj->create($storeObj);
$testObj->delete('test.txt_' . date('Y-m-d') . '_4');
$storeObj2 = new Text('Damian Dark');
$storeObj2->title = 'Новое';
$storeObj2->text = 'Точно новое!!!!!!!!!!';
if (file_exists(__DIR__ . '/appTelegram/storage/test.txt_' . date('Y-m-d') . '_2'))
$testObj->update('test.txt_' . date('Y-m-d') . '_2', $storeObj2);

$listDir = array_diff(scandir(__DIR__ . '/appTelegram/storage'), array('.', '..'));
foreach ($listDir as $item) {
	var_dump($testObj->read($item));
}

var_dump($testObj->list());

