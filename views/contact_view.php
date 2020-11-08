<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche </title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>

    <h2>Formulaire de Contact</h2>
    <div class="content-wrapper_contact">
   
   
            <div class="text-wrapper_contact">
                 <h3> Vous avez des questions</h3>
                <p>Tel: 01 02 03 04 05</p>
                <p>Je suis disponible la semaine </p><br />
                <div id="form">
			<form method="POST" action="index.php">
				<table id="setting_form">
                    <tr>
						<td>Prenom</td>
						<td><input type="text" name="first_name" class="input_form" placeholder="Ex : Jérémie" required></td>
					</tr>
                    <tr>
						<td>Nom</td>
						<td><input type="text" name="name" class="input_form" placeholder="Ex : Jolys" required></td>
					</tr>
					
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" class="input_form" placeholder="Ex : example@google.com" required></td>
					</tr>
                    <tr>
						<td>Objet</td>
						<td><input type="text" name="object" class="input_form" placeholder="Ex : J'ai des supers idées " required></td>
					</tr>
                    <tr>
						<td>Message</td>
						<td><input type="textera" name="message" class="input_form" placeholder="Ex : Il est génial" required></td>
					</tr>
                    
					
					
				</table>
				<div id="button">
					<button type='submit'>Envoyer</button>
				</div>
			</form>
		</div>
                
            </div><!--fin de text-wrapper --> 
        </div><!--fin de content-wrapper --> 

    

    <?php include_once 'views/includes/footer.php'?>

</body>
</html>








