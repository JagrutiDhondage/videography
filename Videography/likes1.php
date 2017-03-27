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
				// connect to mongodb
				$con = new MongoClient();
			/*	echo "entered btn click";*/
				if($con)
				{
					//connecting to database
				$databse=$con->videosance;
				//getting gridfs object
				$collection =$databse->selectCollection('videoDetails'); 
					//echo $collection;
				//get date
				
				//$likes=array("u_id"=> $_SESSION['userid']);
					  $collection->update(array("video_id"=> $id), 
     			array('$addToSet'=>array("likes"=>$_SESSION['userid'])));
					
					$cursor = $collection->findOne((array("video_id"=> $id)));
					foreach($cursor["dislikes"] as $object)
					{
						if($object==$_SESSION['userid'])
						{
							$dislikes->remove(array("u_id"=> $_SESSION["userid"]), array("justOne" => true));
						}
					}
			
				}
				
				else
				{
					die("cannot connect to db");
				}
			}
	}
?>
		