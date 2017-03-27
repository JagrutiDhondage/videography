<?php
session_start(); // Starting Session

$error=''; // Variable To Store Error Message

if (isset($_POST['signin']))
	{
		if (empty($_POST['email']) || empty($_POST['password']))
			{
				?>
							<script>alert('username password invalid!! ');</script>
        <?php
			}
		else
			{
				// Define $username and $password
				//$name=$_POST['name'];
				$password=$_POST['password'];
				$email = $_POST['email'];
	
				// Establishing Connection with Server by passing server_name, user_id and password as a parameter
				$con = new MongoClient();
					if($con)
						{
							// Selecting Database
							$databse=$con->videography;
							//connect to specific collection
							$collection=$databse->userInfo;
							$qry = array("email" => $email/*,"password" => $password*/);
							$result = $collection->findOne($qry);
							if($result['password']==$password)
							{
								$_SESSION['username'] = $result['username'];
								$_SESSION['userid'] = $result['_id'];
								header("Location:loggedhomepage.php");
								
		?>
							<script>alert('Login Sucessfull...!! ');</script>
        <?php
		
							}
							else
							{
		?>
							<script>alert('Wrong Details');</script>
        <?php
							}
						}
			
						else
						{
							die("cannot connect to db");
						}
			}
			
	}
		


?>
