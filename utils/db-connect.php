<?php

function dbConnect() {
    $dns = 'mysql:host=172.16.238.12;dbname=tp_quizz';
    $user = 'root';
    $password = '';
    $db = null;

    try{
        $db = new PDO($dns,$user,$password);
    }
    catch(Exception $error){
        echo "<pre>$error</pre>";
    }

    return $db;
}

?>
