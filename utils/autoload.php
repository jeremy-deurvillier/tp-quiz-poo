<?php

function entityAutoloader($entity) {
    require_once('entity/' . strtolower($entity) . '.php');
}

spl_autoload_register('entityAutoloader');

?>
