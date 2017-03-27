<?php

session_start();
$id=$_POST['videoid'];
$id=new MongoId($id);
			
if(isset($_POST['btn-dislike']))
	{
						$array = "";
			if ($_SESSION["username"] == $array || $_SESSION["userid"] == $array)
			{
			?>
			<script>alert('Please Sign In before disliking video')</script>
			<?php
			}
			else
			{
				// connect to mongodb
				$con = new MongoClient();
			/*	echo "entered btn click";*/
				if($con)
				{
					//connecting to database
				$databse=$con->videography;
				//getting gridfs object
				$collection =$databse->selectCollection('videoDetails'); 
					//echo $collection;
				//get date
				
				//$dislikes=array("user"=> $_SESSION['username']);
					   $collection->update(array("video_id"=> $id), 
     			array('$addToSet'=>array("dislikes"=>$_SESSION['userid'])));
					$col =$databse->selectCollection('userInfo'); 
				$col->update(array("_id"=> $_SESSION['userid']),
											array('$pull'=>array("likedVideo"=>$id)));
					$cursor = $collection->findOne((array("video_id"=> $id)));
					foreach($cursor["likes"] as $object){
					if($object==$_SESSION['userid'])
					{
						$collection->update(array("video_id"=> $id),
											array('$pull'=>array("likes"=> $_SESSION["userid"])));
							
					}
					}
				
			 
				
				}
				
				else
				{
					die("cannot connect to db");
				}
			}
	}

function getdislikes($id){
		$count=0;
		$id=new MongoId($id); //echo $id;
		$con = new MongoClient();
		$databse=$con->videography;
		$collection =$databse->selectCollection('videoDetails'); //echo $collection;
		$object=$collection->findOne(array("video_id"=> $id));
		foreach( $object["dislikes"] as $userid)
			$count++;	//echo $count;
		return $count;
		
		
	}
?>
		