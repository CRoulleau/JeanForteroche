<?php

// CONNEXION: on verifie qu'il y a un email et un mdp 
if(!empty($_POST['email']) && !empty($_POST['password'])){

	// on les met dans des VARIABLES
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$error		= 1;

	// CRYPTER LE PASSWORD
	//$password = "aq1".sha1($password."1254")."25";

	//echo $password;
//prepare une requete pour vérifier si email est ds la bdd => il va prendre tt les infos de l'utilisateurs qui a ce mail
	$req = $db->prepare('SELECT * FROM users WHERE email = ?');
	$req->execute(array($email));

	while($user = $req->fetch()){

		if($password == $user['password']){
			$error = 0;
			//$_SESSION['connect'] = 1;
			//$_SESSION['pseudo']	 = $user['pseudo'];

		/*	if(isset($_POST['connect'])) {
				setcookie('log', $user['secret'], time() + 365*24*3600, '/', null, false, true);
			}
            */

			header('location: index.php?page=connexion&amp;success=1');//là on on rediriger
			exit();
		}

	}

	if($error == 1){
		header('location: index.php?page=contact&amp;error=1');
		exit();
	}

}


?>
