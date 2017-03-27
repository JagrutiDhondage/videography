<?php
//echo "entered for";
session_start();
$id=$_POST['videoid'];
$id=new MongoId($id);
			
			if(isset($_POST['btn-addcomment']))
			{
				  //echo "entered for";
				// connect to mongodb
				$con = new MongoClient();
				//echo "entered btn click";
				if($con)
				{
					//connecting to database
				$databse=$con->videography;
				//getting gridfs object
				$collection =$databse->selectCollection('videoDetails'); echo $collection;
				//get date
				$date= getdate();
				$date="$date[mday]/$date[mon]/$date[year]";
				$comments=array("commenter"=> $_SESSION['username'],"commentDate"=> $date,"date"=>new MongoDate(),"comment"=>$_POST['comment']);
			    $collection->update(array("video_id"=> $id), 
     			array('$push'=>array("comments"=>$comments)));
				
				}
			else
				{
					die("cannot connect to db");
				}	
			}

	function getComment($id){
		$count=0;
		$id=new MongoId($id); //echo $id;
		$con = new MongoClient();
		$databse=$con->videography;
		$collection =$databse->selectCollection('videoDetails'); //echo $collection;
		$object=$collection->findOne(array("video_id"=> $id));
		foreach( $object["comments"] as $comment)
			$count++;	//echo $count;
		return $count;
		
		
	}

?>
		