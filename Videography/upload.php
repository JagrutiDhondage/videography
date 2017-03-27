<?php

session_start();
if(isset($_POST['btn-upload']))
{
	$array = "";
	if ($_SESSION["username"] == $array || $_SESSION["userid"] == $array)
	{
	?>
	<script>alert('Please Sign In before uploading video')</script>
	<?php
	}
	else
	{
		
		$title = $category = $description = $likes = $dislikes = $comments = $uploadDate = $contentType = "";
		$video_id = $uploader_id = "";
		//setting the file type
		$videoFileType = pathinfo(basename($_FILES["video"]["name"]),PATHINFO_EXTENSION);
		//$videoFileType = $_FILE["video"]["type"];
		//checking for file support
		if( $videoFileType!=mp4 && $videoFileType!=ogv && $videoFileType!=webm )
		{
			?>

			<script> alert('File type not supported'); </script>

		<?php
		}
		else
		{

			// connect to mongodb
			$con = new MongoClient();

		//==========================
			if($con)
			{
				//connecting to database
				$databse=$con->videography;
				//getting gridfs object
				$gridfs =$databse->getGridFS('video');
				
				// getting the values
				$title = $_POST['title'];
				$category = $_POST['category'];
				$desc = $_POST['desc'];
				//get date
				$date= getdate();
				$uploadDate="$date[mday]/$date[mon]/$date[year]";
				//get uploader data from session
				//echo $_SESSION['username'];
				$uploader_data = array('u_id'=>$_SESSION["userid"],'username'=> $_SESSION['username']);	//is an array
				//uploading video and data in gridfs
				$id = $gridfs->storeUpload('video', array('title'=>$title,'category'=>$category,
													  'desc'=>$desc,'uploadDate' => $uploadDate,
													  'status'=>0,					//status by default, view Video
													  'date'=> new Mongodate(),
													  'uploader_data' => $uploader_data));
				
				$collection = $databse->userInfo;
				$collection->update(array("username"=>$_SESSION["username"]), 
     			 array('$push'=>array("video_id"=>$id)));
				//create videoDetails for the uploaded video
				
				$collection = $databse->videoDetails;
				$collection->save(array("video_id"=>$id,"comments" => [],"likes"=>[],"dislikes"=>[],"views"=>0));
				?>

				<script>alert('successfully uploaded!');</script>
			<?php

			}
			else{
				die("cannot connect to db");
			}	

		}
		
	}
	
	
}


function videoId(){

	$connect = new MongoClient();
	if($connect)
	{
		$db = $connect->videodb;
		$id = $db->id;
		$videoid = $id["videoid"];
		$id->update(array("videoid"=>$videoid), array('$set'=>array("videoid"=>$videoid+1)));
	}
	
	return $videoid;
}
?>