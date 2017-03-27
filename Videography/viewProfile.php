<?php
include 'upload.php';
include 'logout.php';
include 'update.php';
include 'delete.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $_SESSION["username"]; ?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	  
	header{
		height : 90px;
		padding: 5px;
		background-color: #226db2;
		
	  }
	  /* set color and font to logo*/
	  .logo{
		  color : white;
		  font-style: oblique;
		  font-size : 250%;	
		  font-family: "Times New Roman", Times, serif;
		  letter-spacing: 2px;
	  }
	  
	  /* padding*/
	  .sign{
		  padding-top : 5px;
		 /* padding-bottom : 5px;
		 padding-right : 15px;
		  padding-left : 15px;*/
	  }
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /*user login style*/
    .uinfo{
     font-family: "Times New Roman", Times, serif;
      
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
	/* drop down changes*/
.dropbtn {
    background-color: #f1f1f1;
    color: black;
    padding: 14px;
    font-size: 16px;
	font-family: "Times New Roman", Times, serif;
  	min-width: 290px;
    min-height:10px;
    border: none;
    cursor: pointer;
    text-align:left;
}

.dropbtn:hover, .dropbtn:focus {
 //   background-color: #226db2;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 290px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding:  12px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {//background-color: #226db2
    }

.show {display:block;}
	  
	  
  </style>
</head>
<body>
	<!------ head-------->
<header class="container-fluid text-center">
	<div class="col-sm-10">
		<h3 class="logo	"><span class="glyphicon glyphicon-facetime-video"></span> <strong>VideoGraphy </strong></h3>
	</div>
	&nbsp;&nbsp;
	
	<form action = logout.php method="post">
		<div class="col-sm-2">
			<button type="submit" class="btn btn-default" name="logout">Logout</button>
		</div>
	</form>
</header>
	
	<!----------- -->
<div class="container-fluid">
  <div class="row content">
	  <!--------navigation start--->
    <div class="col-sm-3 sidenav">
     <!---<h4>Category</h4>----->
<?php 
	
		
	session_start(); 
				
	$connect = new MongoClient(); 
	
		$db = $connect->videography;  
		$col = $db->userInfo; 
		$uid=$_SESSION['userid'];
        $uid=new MongoId($uid);
	    $user = $col -> findOne(array('_id'=>$uid));
        echo '<h2 class="uinfo">'.$user["username"].'</h2>';
	      echo '<h4 class="uinfo">'."\t".'<span class="glyphicon glyphicon-envelope"></span> '.$user["email"].'</h4>';
       
		
?>
		<br>
      <ul class="nav nav-pills nav-stacked">
		  <li ><a href="loggedhomepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li class="active"><a href="viewProfile.php"><span class="glyphicon glyphicon-facetime-video"></span>  My Videos</a></li>
		  <li ><a href="mylikes.php"><span class="glyphicon glyphicon-play-circle"></span>  Liked Videos</a></li>
		  <li ><a href="myviews.php"><span class="glyphicon glyphicon-repeat"></span>  History</a></li>
        <li ><a href="analysis.php"><span class="glyphicon glyphicon-stats"></span>  Analysis</a></li></ul>
	
      <br><br>
	 <form method="post" action="logSearch.php">
        <div class="input-group">
          <input type="text" name ="search" class="form-control" placeholder="Search Video..">
          <span class="input-group-btn">
            <button class="btn btn-default" name ="searchbtn"type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
       </div>
      </form> 
		<br><br>
	<!--------------------------------------------------------------------------------------------------upload button-->
		<div class="col-sm-1">
			<div class="container">
			 <!-- Trigger the modal with a button -->
			 <form method="post">
  				<button type="button" class="btn btn-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Upload</button>
			 </form>	 
			<!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">	<!---modal header------->
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Upload Video</h4>
					</div>
					<div class="modal-body"> <!---modal body------->
						<div class="container">
							<!---modal form------->
						  <form class="form-horizontal" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-xs-1" for="title">Title:</label>
								<div class="col-xs-4">
								<input type="name" name = "title" class="form-control" id="name" placeholder="Enter title" required>
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-xs-1" for="video">Upload Video:   </label>
							   <span class="btn btn-default btn-file"> 
							   <input type="file" name="video" id= "video" required>
								</span>
							</div>
							<div class="form-group">
								<div class="dropdown">
								<label class="control-label col-xs-4" for="category">Category:   </label>
								<div class ="col-xs-6">
								<select class = "form-control" id= "category" name = "category" value="Category"required>
								<option value ="music">Music</option>
								<option value ="Entertainment">Entertainment</option>
								<option value ="sports">Sports</option>	
								<option value ="news">News</option>
								</select>
								</div>
								</div>
							</div>

							<div class="form-group">
									<label class="control-label col-xs-1" for="comment">Description:</label>
									<div class="col-xs-4">
										<textarea name="desc" class="form-control" rows="3" id="desciption" ></textarea>
									</div>
							</div>

							<div class="form-group">
								<div class="col-xs-6">
								<button type="submit" name="btn-upload" class="btn btn-default">Upload</button>
								</div>
							</div>


						  </form>
						</div>

					</div>
					<div class="modal-footer">	<!---modal footer------->
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>

				</div>
			  </div>
			</div>
		<!--------modal end------->
		</div>

    </div>
	
 <!-----------navigation end------>
	  
	  <!---------video display--->
    <div class="col-sm-9">
		
		
      <!--recently uploaded video-->
      <h4><small>MY VIDEOS</small></h4>
      <hr>
<?php 
	
		
	session_start(); 
				//echo "hi";

	$connect = new MongoClient(); 
	
		$db = $connect->videography;  
		$col = $db->userInfo; 
		$uid=$_SESSION['userid'];

		$user = $col -> findOne(array('_id'=>$uid));
		//$user["video_id"]->sort(array("date"=> -1));
		foreach ($user['video_id'] as $video)
		{
			
			$vid = $video;
			$vid=new MongoId($vid);
			$col2 = $db->selectCollection('video.files');
			//echo $col2;
			$video_retrieve = $col2 -> findOne(array('_id'=>$vid));
			echo ' <div class = "container">';
				echo ' <div class = "col-sm-4">';
					echo	'<video width="320" height="240 ">';
					echo	'	<source src="'.viewVideo($video_retrieve["_id"]).'" type ="video/mp4">';
					echo	'</video>';
				echo "</div>";

				echo ' <div class = "col-sm-6">';
					$id=$video_retrieve["_id"];
					echo '<a href="myprofileview.php?id=';
					echo $id.'"';
					echo '> <h2> '.$video_retrieve["title"].' </h2></a> ';
					echo  '<h5><span class="glyphicon glyphicon-time"></span> '. $video_retrieve["uploadDate"].'</h5>' ;
					echo	"\n\t";
					echo	'<p>'.$video_retrieve["desc"].'</p>';
				//	echo "</div>";
			
			 echo'   <div class="container">
   
			 <!-- Trigger the modal with a button -->
			  <div>
				 <form method="post">
  					<button type="button" class="btn btn-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myupdate'.$video_retrieve["_id"].'" >Update</button>
				 </form> 
			 	<br>
			  	<form method="post">
                	<button type="submit" name="btn-delete" class="btn btn-primary">Delete</button>
                	<input type="hidden" name="videoid" value="'.$video_retrieve["_id"].'"/>
             	</form>
			 	
	    		  <!-- Modal -->
				  <div class="modal fade" id="myupdate'.$video_retrieve["_id"].'" role="dialog">
						<div class="modal-dialog">

				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">	<!---modal header------->
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Update Video</h4>
					</div>
					<div class="modal-body"> <!---modal body------->
						<div class="container">
							<!---modal form------->
						  <form class="form-horizontal"  method = "post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-xs-1" for="title">Title:</label>
								<div class="col-xs-4">
								<input type="name" name = "title" class="form-control" id="name" placeholder="Enter title" required>
								</div>
							</div>
							
							<div class="form-group">
									<label class="control-label col-xs-1" for="comment">Description:</label>
									<div class="col-xs-4">
										<textarea name="desc" class="form-control" rows="3" id="desciption" ></textarea>
									</div>
							</div>

							<div class="form-group">
								<div class="col-xs-6">
								<button type="submit" name="btn-update" class="btn btn-default">Upload</button>
								<input type="hidden" name="videoid" value="';
                  					echo $video_retrieve["_id"].'">
               					</div>
							</div>


						  </form>
						</div>

					</div>
					<div class="modal-footer">	<!---modal footer------->
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>

				</div>
			  </div>
			</div>
			</div>
		<!--------modal end------->';
		    echo "</div>";
		    echo "</div>";
		}
	
		/* for retreiving video*/
	
	function viewVideo($id){
	
	$m = new MongoClient();
	$gridfs = $m->selectDB('videography')->getGridFS('video');
	
	$stream =$gridfs->findOne(array("_id" => $id))->getResource();
	$stringcoded = stream_get_contents($stream); //converts the stream to string data
	$encoded = base64_encode($stringcoded);  //encodes string data to base64
	
	//echo $encoded;
	return 'data:video/' . "mp4" . ';base64,' . $encoded; 
}
	?>
	
		<!--end of recently uploaded-->
      <br><br>
      <br><br>
		<!--most viewed video-->
     
    </div>
  </div>
</div>

	
<footer class="container-fluid text-center">
  <p>copywrite pict</p>
</footer>

</body>
</html>


	