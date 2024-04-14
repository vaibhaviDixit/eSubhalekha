<?php

echo "id: ".$_REQUEST['id']." lang:".$_REQUEST['lang']." type: ".$_REQUEST['type'];

$wedding = new Wedding();
$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);
echo "<pre>";
print_r($weddingData);