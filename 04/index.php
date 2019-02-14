<?php

require_once 'Text.php';

$get = $_GET;

$text = new Text();
$field = isset($get['field']) ? $get['field'] : 'the';
$data = $text->index($field);

print_r($data);

?>