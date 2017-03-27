<?php
//include 'music.php';
session_start();
$id=$_POST['videoid'];
$id=new MongoId($id);
if(isset($_POST['btn-update'])){
	
	$title = strtolower($_POST['title']);
	$desc = strtolower($_POST['desc']);
	$con = new MongoClient();
	if($con)
			{
				//connecting to database
				$databse=$con->videography;
				//getting gridfs object
				$collection =$databse->selectCollection('video.files');
				//get date
				$date= getdate();
				$uploadDate="$date[mday]/$date[mon]/$date[year]";
			    $collection->update(array("_id"=> $id), 
     			array('$set'=>array("title"=>$title,'desc' =>$desc)));
				
				?>

				<script>alert('successfully updated!');</script>
			<?php

			}
			else{
				die("cannot connect to db");
			}	
}
?>


