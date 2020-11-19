
<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>

    <h2>Connectez-vous</h2>
    
    
    
  


    styles_bootrasp.css


   
  
  <div class="text-center">
    <form class="form-signin">
  
  <h1 class="h3 mb-3 font-weight-normal">Connectez -vous </h1>
  <label for="inputEmail" class="sr-only">Adresse Mail </label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Mot de passe </label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Connection</button>
</form>

      
      
      
      <div class="container">
		<p id="info">Bienvenue sur l'administration</p>
	 	
		<?php
			if(isset($_GET['error'])){
				echo'<p id="error">Nous ne pouvons pas vous authentifier.</p>';
			}
			else if(isset($_GET['success'])){
				echo'<p id="success">Vous êtes maintenant connecté.</p>';
			}
		?>

	 	<div id="form">
			<form method="POST">
				<table>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="password" placeholder="Ex : ********" required ></td>
					</tr>
				</table>
				
				<div id="button">
					<button type='submit'>Connexion</button>
				</div>
			</form>
		</div>
	</div>
      
      
      
      
      
      
      
      

    

    <?php include_once 'views/includes/footer.php'?>
    </div>
</body>
</html>







