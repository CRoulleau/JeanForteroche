<?php

//$db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', 'root');



    try
    {
        $db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
        
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

