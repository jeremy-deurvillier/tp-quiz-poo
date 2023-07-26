<?php

function entityAutoloader($entity) {
    if (substr($entity, -strlen('Repository')) === 'Repository') {
        require_once('repository/' . strtolower($entity) . '.php');
    } else {
        require_once('entity/' . strtolower($entity) . '.php');
    }
}

spl_autoload_register('entityAutoloader');

?>
