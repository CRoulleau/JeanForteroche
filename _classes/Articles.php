<?php

	class Articles
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "root";
		private $database   = "jeanforteroche";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("A échoué à se connecter à la bdd: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}

		// Insert article data into article table
		public function insertData($post)
		{
			$title = $this->con->real_escape_string($_POST['title']);
			$content = $this->con->real_escape_string($_POST['content']);
			$date = $this->con->real_escape_string($_POST['date']);
			
			$query="INSERT INTO articles(title,content,date) VALUES('$title','$content','$date')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?page=crud&amp;msg1=insert");
			}else{
			    echo "Votre article n'est pas enregistré, essayez encore";
			}
		}

		// Fetch article records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM articles";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "Pas trouvé articles";
		    }
		}

		// Fetch single data for edit from article table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM articles WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Pas compris";
		    }
		}

		// Update article data into article table
		public function updateRecord($postData)
		{
		    $title = $this->con->real_escape_string($_POST['utitle']);
		    $content = $this->con->real_escape_string($_POST['ucontent']);
		    $date = $this->con->real_escape_string($_POST['udate']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE articles SET title = '$title', content = '$content', date = '$date' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?page=crud&amp;msg2=update");
			}else{
			    echo "Les modifications ne sont pas enregistrés";
			}
		    }
			
		}


		// Delete article data from article table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM articles WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?page=crud&amp;msg3=delete");
		}else{
			echo "L'article n'est pas supprimé";
            
            
            }
		}

	}
?>