<?php

session_start();
$id=$_POST['videoid'];
$id=new MongoId($id);

if(isset($_POST['btn-like']))
	{
		
						$array = "";
			if ($_SESSION["username"] == $array || $_SESSION["userid"] == $array)
			{
			?>
			<script>alert('Please Sign In before liking video')</script>
			<?php
			}
			else
			{
				
				$con = new MongoClient();
				if($con)
				{
					//connecting to database
				$databse=$con->videography;
				//getting gridfs object
				$collection =$databse->selectCollection('videoDetails'); 
				$collection->update(array("video_id"=> $id), 
     			array('$addToSet'=>array("likes"=>$_SESSION['userid'])));
				//userinfo update
				$col =$databse->selectCollection('userInfo'); 
				$col->update(array("_id"=> $_SESSION['userid']), 
     			array('$addToSet'=>array("likedVideo"=>$id)));
					
					$cursor = $collection->findOne((array("video_id"=> $id))); 	
					foreach($cursor["dislikes"] as $object)
					{
						if($object==$_SESSION['userid'])
						{
							$collection->update(array("video_id"=> $id),
											array('$pull'=>array("dislikes"=> $_SESSION["userid"])));
							
						}
					}
			
				}
				
				else
				{
					die("cannot connect to db");
				}
			}
	}

function getlikes($id){
		$count=0;
		$id=new MongoId($id); //echo $id;
		$con = new MongoClient();
		$databse=$con->videography;
		$collection =$databse->selectCollection('videoDetails'); //echo $collection;
		$object=$collection->findOne(array("video_id"=> $id));
		foreach( $object["likes"] as $userid)
			$count++;	//echo $count;
		return $count;
		
		
	}

?>
		