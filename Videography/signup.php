<?php


session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];


if(isset($_POST['signup']))
{
	
	if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']))
			{
				?>
							<script>alert('username password invalid!! ');</script>
        <?php
			}
		else
			{
				// connect to mongodb
			   $con = new MongoClient();


				if($con)
				{

					//connecting to database
					$databse=$con->videography;
					//echo "Database 'mydb' selected";

					//connect to specific collection
					$collection=$databse->userInfo;
					//echo "Collection user Selected succsessfully";

					//$userid = userId();
					$uploader_data=array('username'=>$name,'email'=>$email,'password'=>$password, 'video_id' => array(),"likedVideo"=>[],"viewedVideo"=>[]);
					$collection->save($uploader_data); 
					$doc = $collection->findOne(array("email"=> $email));

					$_SESSION['username'] = $doc["username"];
					$_SESSION['userid'] =$doc["_id"]; 
					header("Location:loggedhomepage.php");

				}
				else
				{
						die("cannot connect to db");
				}
			}

}

/*
function startSession($email){
	
	//GLOBAL $name;
	$doc = $collection->find(array("email"=> $email));
	session_start();
	$_SESSION['username'] = $doc["name"];
	$_SESSION['userid'] =$doc["_id"]; 
	
}*/
/*
function userId(){

/*	$connect = new MongoClient();
	if($connect)
	{
		$db = $connect->videodb;
		$id = $db->id;
		$userid = $id["userid"];
		$id->update(array("videoid"=>$userid), array('$set'=>array("userid"=>$userid+1)));
		echo $userid;
	}
	*//*
	$id = $db->id;
		$userid = $id["userid"];
		$id->update(array("videoid"=>$userid), array('$set'=>array("userid"=>$userid+1)));
		echo $userid;
	return $userid;
}*/
?>
