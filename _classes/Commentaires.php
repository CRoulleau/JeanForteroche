<?php

	class Commentaire
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
		public function insertComment($post)
		{
			$author = $this->con->real_escape_string($_POST['author']);
			$comment = $this->con->real_escape_string($_POST['comment']);
			$date = $this->con->real_escape_string($_POST['comment_date']);
            $postId = $this->con->real_escape_string($_POST['post_id']);

			
			$query="INSERT INTO comments(author, comment, comment_date, post_id) VALUES('$author','$comment','$date', '$postId')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?page=crud&amp;msg1=insert");
			}else{
			    echo "Votre commentaire n'est pas enregistré, essayez encore";
			}
		}

		// Fetch article records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM comments";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "Pas trouvé de commentaire";
		    }
		}

		// Fetch single data for edit from article table
		public function displyCommentById($id)
		{
		    $query = "SELECT * FROM comments WHERE post_id = '$post_id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Pas compris";
		    }
		}

		// Update article data into article table
		public function updateComment($postData)
		{
		    $author = $this->con->real_escape_string($_POST['uauthor']);
		    $comment = $this->con->real_escape_string($_POST['ucoment']);
		    $date = $this->con->real_escape_string($_POST['udate']);
            $postId = $this->con->real_escape_string($_POST['upost_id']);

		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE comments SET author = '$author', comment = '$comment', date_comment = '$date', post_id = '$postId' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?page=crud&amp;msg2=update");
			}else{
			    echo "Les modifications ne sont pas enregistrés";
			}
		    }
			
		}


		// Delete article data from article table
		public function deleteComment($id)
		{
		    $query = "DELETE FROM comments WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?page=crud&amp;msg3=delete");
		}else{
			echo "Le commentaire n'est pas supprimé";
            
            
            }
		}
        
        // Fetch single data for edit from article table
		public function displyCommentByPostId($id)
            
		{
            $query = "SELECT comments.post_id as postIdCrud, articles.id as articlePostId
           FROM articles
            INNER JOIN comments
            ON comments.post_id = articles.id";
            $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Pas compris";
		    }
		}
        
       
        //joindre les 2 tables
      //  public function postIdDisplay($id)
      //  {
       //     $query = "SELECT * FROM comments WHERE post_id = '$post_id' ";
       //     SELECT comments.post_id as postIdCrud, articles.id as articlePostId
        //    FROM articles
        //    INNER JOIN comments
        //    ON comments.post_id = articles.id
    //    }
        
        
        
        

	}
?>