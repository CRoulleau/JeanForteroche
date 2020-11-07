<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche </title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>

    <h2>Contact</h2>
    <div class="content-wrapper_contact">
   
   
            <div class="text-wrapper_contact">
                 <h3> Vous avez des questions</h3>
                <p>Tel: 01 02 03 04 05</p>
                <p>Je suis disponible la semaine </p>
                <div id="form">
			<form method="POST" action="index.php">
				<table>
                    <tr>
						<td>Prenom</td>
						<td><input type="text" name="first_name" placeholder="Ex : Nicolas" required></td>
					</tr>
                    <tr>
						<td>Nom</td>
						<td><input type="text" name="name" placeholder="Ex : Nicolas" required></td>
					</tr>
					
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
                    <tr>
						<td>Objet</td>
						<td><input type="text" name="object" placeholder="Ex : Nicolas" required></td>
					</tr>
                    <tr>
						<td>Message</td>
						<td><input type="textera" name="pseudo" placeholder="Ex : Nicolas" required></td>
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








