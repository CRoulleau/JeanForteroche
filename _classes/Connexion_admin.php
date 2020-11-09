<?php

class Connexion_admin
{
    
    private $email;
	private $password;
	private $error;
    private $db;

	public function __construct($email, $password){
		$this->mail = $mail;
		$this->password = $password;
        $this->error = $error;
		
	}

	public function login(){
        
        
       // CONNEXION: on verifie qu'il y a un email et un mdp 
if(!empty($_POST['email']) && !empty($_POST['password'])){

	// on les met dans des VARIABLES
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$error		= 1;

	
	//echo $password;
//prepare une requete pour vérifier si email est ds la bdd => il va prendre tt les infos de l'utilisateurs qui a ce mail
	$req = $db->prepare('SELECT * FROM users WHERE email = ?');
	$req->execute(array($email));

	while($user = $req->fetch()){

		if($password == $user['password']){
			$error = 0;
			

			header('location: home_view.php?success=1');//là on on rediriger
			exit();
		}

	}

	if($error == 1){
		header('location: admin_model.php?error=1');
		exit();
	}

}
        
    }

    
    
    
	

    
    
    
    
    
}


