<?php

function getViews($id)

	{   
            $id=new MongoId($id);
            $con = new MongoClient();
              //connecting to database
             $databse=$con->videography;
             $collection =$databse->selectCollection('videoDetails');    
          	 $collection->update(array("video_id"=> $id), 
     			array('$inc'=>array("views"=>1)));
		      $cursor = $collection->findOne(array("video_id" =>$id));
		return $cursor['views'];
	}

function getDeletedViews($id)

	{   
            $id=new MongoId($id);
            $con = new MongoClient();
              //connecting to database
             $databse=$con->videography;
             $collection =$databse->selectCollection('videoDetails');    
         /*   $collection->update(array("video_id"=> $id), 
     			array('$inc'=>array("views"=>1)));*/
		      $cursor = $collection->findOne(array("video_id" =>$id));
		return $cursor['views'];
	}

function addView($id){
		
	$flag=0;
	 $id= new MongoId($id);
	 $con = new MongoClient();
	  //connecting to database
	 $databse=$con->videography;
	 $collection =$databse->selectCollection('userInfo');
	$cursor = $collection->findOne((array("_id"=>$_SESSION["userid"]))); 	//echo $cursor["_id"];
	foreach($cursor["viewedVideo"] as $object)
	{
		if($object["video_id"]==$id)
		{
			$collection->update(array("_id"=>$_SESSION["userid"]),
								array('$pull'=>array("viewedVideo"=>["video_id"=> $id]))); 
			$collection->update(["_id"=>$_SESSION["userid"] ],
							 ['$push'=>["viewedVideo"=>["date"=>new MongoDate,"video_id"=>$id]]]);
			$flag=1;
		}
	}
	
	if(!$flag)
	{
		 $collection->update(["_id"=>$_SESSION["userid"] ],
							 ['$push'=>["viewedVideo"=>["date"=>new MongoDate,"video_id"=>$id]]]);
	}
}
?>