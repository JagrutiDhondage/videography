
<?php include 'upload.php'; 
include 'logout.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sports <?php echo " :".$_SESSION["username"]; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	  
	header{
		height : 90px;
		padding: 10px;
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
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
	  
	  
  </style>
</head>
<body>
	<!------ head-------->
<header class="container-fluid text-center">
	<div class="col-sm-10">
		<h3 class="logo	"><span class="glyphicon glyphicon-facetime-video"></span> <strong>VideoGraphy </strong></h3>
	</div>
	<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<div class="col-sm-1">
			<button type="submit" class="btn btn-default" name="logout">Logout</button>
		</div>
	</form>
	<form action = "viewProfile.php" method="post">
		<div class="col-sm-1">
			<button type="submit" class="btn btn-default" name="profile">View Profile</button>
		</div>
	</form>
</header>
	
	<!----------- -->
<div class="container-fluid">
  <div class="row content">
	  <!--------navigation start--->
    <div class="col-sm-3 sidenav">
       <h4> <span class="glyphicon glyphicon-menu-hamburger"></span> Category</h4>
      <ul class="nav nav-pills nav-stacked">
          <li ><a href="loggedhomepage.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="logMusic.php"> <span class="glyphicon glyphicon-music"></span> Music</a></li>
		 <li><a href="logEntertainment.php"> <span class="glyphicon glyphicon-film"></span> Entertainment</a></li>
        <li class="active"><a href="logSports.php"> <span class="glyphicon glyphicon-cd"></span> Sports</a></li>
        <li ><a href="logNews.php"> <span class="glyphicon glyphicon-globe"></span> News</a></li>
      </ul><br>
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
	<!--upload button-->
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
						  <form class="form-horizontal"  method = "post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-xs-1" for="title">Title:</label>
								<div class="col-xs-4">
								<input type="name" name = "title" class="form-control" id="name" placeholder="Enter title" required>
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-xs-1" for="video">Upload Video:</label>
							   <span class="btn btn-default btn-file"> 
							   <input type="file" name="video" id= "video" required>
								</span>
							</div>
							<div class="form-group">
								<div class="dropdown">
								<label class="control-label col-xs-1" for="category">Category:</label>
								<div class ="col-xs-4">
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
      <h4><small>SPORTS UPLOADS</small></h4>
      <hr>
		<?php 
	
		
	$connect = new MongoClient(); 
	if($connect)
	{
		$db = $connect->videography;  
		$col = $db->selectCollection('video.files'); 
		$cursor = $col->find((array("category" => 'sports'))); 
		$count = $cursor->count();
		$cursor->sort(["date"=>-1]);
		foreach($cursor as $object){
			echo ' <div class = "container">';
				echo ' <div class = "col-sm-4">';
					echo	'<video width="320" height="240 ">';
					echo	'	<source src="'.viewVideo($object["_id"]).'" type ="video/mp4">';
					echo	'</video>';
				echo "</div>";

				echo ' <div class = "col-sm-6">';
					echo '<a href="logselectVideo.php?id=';
                            echo $object["_id"].'"';
			 				 echo '> <h2> '.$object["title"].' </h2></a> ';
					echo  '<h5><span class="glyphicon glyphicon-time"></span> '.$object["uploadDate"].'</h5>' ;

					echo	"\n\t";
					echo	'<p>'.$object["desc"].'</p>';

				echo "</div>";
		 echo "</div>";
		
		}
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
  
    </div>
  </div>
</div>

	
<footer class="container-fluid text-center">
  <p>copywrite pict</p>
</footer>

</body>
</html>
