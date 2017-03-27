
<?php
//include 'music.php';
session_start();

$id=$_POST['videoid'];
$id=new MongoId($id);
//echo $id;
if(isset($_POST['btn-delete'])){
	
	$con = new MongoClient();
	if($con)
			{
				
				//connecting to database
				$databse=$con->videography;
				//remove video id from user info
				$user =$databse->selectCollection('userInfo');
				$uid= new MongoId($_SESSION['userid']); //echo $uid;
				//$user->update(array("_id"=> $uid), 
     			//array('$pull'=>array("video_id"=>$id)));

				//getting gridfs collection
				$collection =$databse->selectCollection('video.files');
				//removing video from db by id
				$collection->update(array("_id"=> $id),
						   array('$set'=>array('status'=>1)));
				//removing video from videoDetails
				//$collection =$databse->selectCollection('videoDetails');
				//$collection->remove(array("video_id"=> $id));
				?>

				<script>alert('Video had been deleted!');</script>
			<?php

			}
			else{
				die("cannot connect to db");
			}	
}
?>