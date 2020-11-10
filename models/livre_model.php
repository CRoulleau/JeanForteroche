<?php

/*if (isset($_POST['title'])){
   
    
    $req = $db->prepare('SELECT title FROM articles WHERE title = ?');
$req->execute(array($_POST['title']));


    
}*/

$req = $db->query('SELECT title, content FROM articles ORDER BY id DESC LIMIT 0, 4 ');


