
<?php include //'upload.php'; 
include 'signup.php';
include 'signin.php';
include 'delete.php';
include 'logout.php';
include 'viewProfile';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search </title>
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
	<form  method="post">
		<div class="col-sm-1">
			<button type="submit" class="btn btn-default" name="logout">Logout</button>
		</div>
	</form>
	<form method="post">
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
          <li class="active"><a href="loggedhomepage.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="logMusic.php"> <span class="glyphicon glyphicon-music"></span> Music</a></li>
		 <li><a href="logEntertainment.php"> <span class="glyphicon glyphicon-film"></span> Entertainment</a></li>
        <li><a href="logSports.php"> <span class="glyphicon glyphicon-cd"></span> Sports</a></li>
        <li><a href="logNews.php"> <span class="glyphicon glyphicon-globe"></span> News</a></li>
      </ul><br>
      <!--------------------------------------------------------search video-------------------->
      <form method="post">
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
      <h4><small>SEARCHED RESULTS</small></h4>
      <hr>
		<?php 
	

	
	$searchText=$_POST['search'];
	$connect = new MongoClient(); 
	if($connect)
	{
		$db = $connect->videography;  
		$col = $db->selectCollection('video.files'); 
		//-------------------------------------------videos by title and description
		$col->ensureIndex(array("title"=>'text',"desc"=>'text'));
		$cursor=$col->find(['$text'=> ['$search'=> $searchText]]);
		$cursor->sort(["date"=>-1]);
		if($cursor->hasNext() == NULL){
		echo "<h3>No results found</h3>";	
		}
		foreach($cursor as $object){
			
		  echo ' <div class = "container">';
          echo ' <div class = "col-sm-4">';
          echo	'<video width="320" height="240 ">';
          echo	'	<source src="'.viewVideo($object["_id"]).'" type ="video/mp4">';
          echo	'</video>';
          echo "</div>";

           echo ' <div class = "col-sm-6">';
           $id=$object["_id"];
           echo '<a href="logselectVideo.php?id=';
            echo $id.'"';
            echo '> <h2> '.$object["title"].' </h2></a> ';
         	  echo  '<h5><span class="glyphicon glyphicon-time"></span> '. $object["uploadDate"].'</h5>' ;
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


