
<?php 

include 'upload.php'; 
include 'signup.php';
include 'signin.php';
include 'likes.php';
include 'dislikes.php';
//include 'download.php';
include 'addcomment.php';
include 'views.php';

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo getTitle(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	  
	header{
		height : 90px;
		padding: 15px;
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
	  
	  /*descriptions*/
	  a.thick{
		  color: green;
		  font-weight: bold;
	  }
	  
  </style>
</head>
<body>
	<!------ head-------->
<header class="container-fluid text-center">
	<div class="col-sm-10">
		<h3 class="logo	"><span class="glyphicon glyphicon-facetime-video"></span> <strong>VideoGraphy </strong></h3>
	</div>
	<!-----------------sign in form-->
		<div  class="col-sm-1">
			<!-- Trigger the modal with a button -->
  			<button type="button" class ="btn btn-default"class="btn btn-info btn-lg" data-toggle="modal" data-target="#idSignin"  >Sign in</button>

			 <div class="modal fade" id="idSignin" role="dialog">
  			  <div class="modal-dialog">
    
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">SIGN IN</h4>
				</div>
				<div class="modal-body">
					<div class="container">

					  <form class="form-horizontal"  method = "post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label col-xs-1" for="email">Email-ID:</label>
							<div class="col-xs-4">
							<input type="email" name = "email" class="form-control" id="email" placeholder="Enter Email-ID" pattern="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" required>
							</div>
						</div>
						<div class="form-group">
								<label class="control-label col-xs-1" for="comment">Password:</label>
								<div class="col-xs-4">
									<input type="password" name = "password" class="form-control" id="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters." required>
								</div>
						</div>

						<div class="form-group">
							<div class="col-xs-6">
							<button type="submit" name="signin" class="btn btn-default" >Signin</button>
							</div>
						</div>
					  </form>
					  </div>
				<!------body end-->
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div>

			</div>
		  </div>
			
			<!-------modal sign in end--->
		</div>
	<!-------------sign up form--->
		<div  class="col-sm-1">
			<!-- Trigger the modal with a button -->
			  <button type="button" class="btn btn-default" class="btn btn-info btn-lg" data-toggle="modal" data-target="#idSignup" >Sign Up</button>

			  <!-- Modal -->
			  <div class="modal fade" id="idSignup" role="dialog">
				<div class="modal-dialog">

				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">SIGN UP</h4>
					</div>
					<div class="modal-body">
						<div class="container">

						  <form class="form-horizontal"  method = "post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-xs-1" for="email">Name:</label>
								<div class="col-xs-4">
								<input type="name" name = "name" class="form-control" id="name" placeholder="Enter Username"pattern="[a-zA-Z]+" title="Only Alphabets" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-1" for="email">Email-ID:</label>
								<div class="col-xs-4">
								<input type="email" name = "email" class="form-control" id="email" placeholder="Enter Email-ID" pattern="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" required>
								</div>
							</div>
							<div class="form-group">
									<label class="control-label col-xs-1" for="comment">Password:</label>
									<div class="col-xs-4">
										<input type="password" name = "password" class="form-control" id="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters." required>
									</div>
							</div>

							<div class="form-group">
								<div class="col-xs-6">
								<button type="submit" name="signup" class="btn btn-default">Sign Up</button>
								</div>
							</div>


						  </form>
						  </div>

					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>

				</div>
			  </div>

			
		</div>

</header>
	
	<!----------- -->
<div class="container-fluid">
  <div class="row content">
	  <!--------navigation start--->
    <div class="col-sm-3 sidenav">
      <h4> <span class="glyphicon glyphicon-menu-hamburger"></span> Category</h4>
      <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="homepage.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="music.php"> <span class="glyphicon glyphicon-music"></span> Music</a></li>
		 <li><a href="Entertainment.php"> <span class="glyphicon glyphicon-film"></span> Entertainment</a></li>
        <li><a href="sports.php"> <span class="glyphicon glyphicon-cd"></span> Sports</a></li>
        <li><a href="news.php"> <span class="glyphicon glyphicon-globe"></span> News</a></li>
      </ul><br>
      <form method="post" action="search.php">
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
	
    </div>
	
 <!-----------navigation end------>
	  
	  <!---------video display--->
    <div class="col-sm-9">
		
		
      <!--recently uploaded video-->
      
      <hr>
<style>
			.thumbnail {
    padding:0px;
}
.panel {
	position:left;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:80%;
	width:0;
	height:0;
	/*display:block;*/
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
		</style>
		
		<?php 
	
		
	$connect = new MongoClient(); 
	if($connect)
	{
		$db = $connect->videography;  
		$col = $db->selectCollection('video.files'); 
		//$comments = array('commenter'=> $_SESSION['username'],'comment'=>$_POST['comment']);	//creates an array)(will it everytime assign cnum=0?)
		$id=$_GET['id'];
		$id=new MongoId($id);
		$object = $col->findOne((array("_id" =>$id))); 
    foreach($object['uploader_data'] as $obj)
	       $name= $obj;   //to get uploader name
			  echo ' <h2> '.$object["title"].' </h2><hr>';
				//check for status
				if($object["status"]== 0){
					//echo '<p>'.$object["status"].'</p>';
					echo	'<video width="900" height="480" controls>';
					echo	'	<source src="'.viewVideo($object["_id"]).'" type ="video/mp4">';
					echo	'</video><br><br><br>'; 
				}
				else{
				echo	'<video width="900" height="480" controls>';
					echo	'	<source src="" type ="video/mp4">';
					echo	'</video><br>'; 
				echo'<div class="alert alert-danger">
    					<strong>Caution!</strong> Content not available. Video has been deleted!
  					</div>';
				}
				echo ' <div class="w3-container w3-light-grey">';
				echo  '<h5><span class="glyphicon glyphicon-user"></span> <a class="thick">Published by: </a>'. $name.'</h5>';
				echo  '<h5><span class="glyphicon glyphicon-time"></span> <a class="thick">Published on: </a> : '. $object["uploadDate"].'</h5>';
		    if($object["status"]== 0){
				echo ' <form method="post">';
			 	echo '<div class="col-sm-1">
				 		<button class="btn btn-default" name="btn-like" type="submit">
						<span class="glyphicon glyphicon-thumbs-up"></span> '.getlikes($_GET['id']).'</button>
						<input type="hidden" name="videoid" value="'.$_GET["id"].'" />
						</div><div class="col-sm-1">
						<button class="btn btn-default" name="btn-dislike" type="submit">
						<span class="glyphicon glyphicon-thumbs-down"></span> '.getdislikes($_GET['id']).'</button>
						<input type="hidden" name="videoid" value="'.$_GET["id"].'" />
						</div> </form>
						<div class="col-sm-1">
						<button class="btn btn-default">
						<span class="glyphicon glyphicon-eye-open"></span> ';
						echo getViews($_GET['id']);
					echo '</button> </div><br><br>';
			}else{
				echo '<div class="col-sm-1">
				 		<button class="btn btn-default" name="btn-like">
						<span class="glyphicon glyphicon-thumbs-up"></span> '.getlikes($_GET['id']).'</button>
						</div><div class="col-sm-1">
						<button class="btn btn-default" name="btn-dislike">
						<span class="glyphicon glyphicon-thumbs-down"></span> '.getdislikes($_GET['id']).'</button>
						</div>
						<div class="col-sm-1">
						<button class="btn btn-default">
						<span class="glyphicon glyphicon-eye-open"></span> ';
						echo getDeletedViews($_GET['id']);
					echo '</button> </div><br><br>';
			}
				  echo	'<p><a class="thick">Description:</a><br>'.$object["desc"].'</p>';
					/*echo	'<p>FileName:'.$object["filename"].'
								<button class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-save"></span></button><br>
								</p>';*/
			  echo "</div>";
	      
    /*    foreach($object["comments"] as $obj)
        {
          echo '      
             <div class="row">
              <div class="col-sm-2 text-center">
                <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
              </div>
              <div class="col-sm-10">
                <h4>'.$obj["commenter"].'<small>'.$obj["date"].'</small></h4>
                <p>'.$obj["comment"].'</p>
                <br>
              </div>
              <br>
            </div>';
        
        }*/
			
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
																			<!---comments part--->
		<br>
<div class="container">
  <div class="col-sm-8">
       <p><span class="badge"><?php echo getComment($_GET['id']); ?></span> Comments:</p><br>
  </div>
</div> <!-- /comments -->

	<?php     
            /*check comments*/
		$connect = new MongoClient();
		$db = $connect->videography;  
		$col = $db->selectCollection('videoDetails');
      $id=$_GET['id'];
		$id=new MongoId($id);
		$cursor = $col->findOne(array("video_id" =>$id)); 
       // echo "entered for";
     // $cursor["comments"]->sort(["date"=>-1]);
       foreach($cursor["comments"] as $object)
        {
          echo '      
             <div class="row">
              <div class="col-sm-2 text-center">
                <img src="user.png" class="img-circle" height="65" width="65" alt="Avatar">
              </div>
              <div class="col-sm-10">
                <h4>'.$object["commenter"].'<small>   '.$object["commentDate"].'</small></h4>
                <p>'.$object["comment"].'</p>
                <br>
              </div>
              <br>
          </div>';
       //   echo "entered for";
       // echo 'username: '.$object["commenter"].'<br>'.$object["comment"];
        }
      
      	function getTitle(){
		$id=$_GET['id'];
		$id=new MongoId($id);
		$connect = new MongoClient(); 
		$db = $connect->videography;  
		$col = $db->selectCollection('video.files'); //echo $col;
		$object = $col->findOne(array("_id" =>$id)); 
			//echo $object;
		return $object["title"];
	}
    
					 ?>

    </div>
		</div>
  </div>
<footer class="container-fluid text-center">
  <p>copywrite pict</p>
</footer>

</body>
</html>

