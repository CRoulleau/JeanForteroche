<?php

//$db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', 'root');



    try
    {
        $db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', 'root');
        
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

