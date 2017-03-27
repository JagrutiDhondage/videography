<?php include 'upload.php'; 
include 'signup.php';
include 'signin.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Analysis</title>
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
    background-color: #226db2;
    color: white;
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
    background-color: #226db2;
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

.dropdown a:hover {background-color: #226db2}

.show {display:block;}
	  
 /*user login style*/
.uinfo{
 font-family: "Times New Roman", Times, serif;
      
	  
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
	    echo '<h4 class="uinfo">'.'<span class="glyphicon glyphicon-envelope"></span> '.$user["email"].'</h4>';
       
		
?>
		<br>
      <ul class="nav nav-pills nav-stacked">
		   <li ><a href="loggedhomepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="viewProfile.php"><span class="glyphicon glyphicon-facetime-video"></span>  MyVideos</a></li>
		<li ><a href="mylikes.php"><span class="glyphicon glyphicon-play-circle"></span>  Liked Videos</a></li>
		  <li ><a href="myviews.php"><span class="glyphicon glyphicon-repeat"></span>  History</a></li></ul>
		
        <!----<li ><a href="homepage.php">Analysis</a></li>---->
		  <ul class="nav nav-pills nav-stacked">
		  <div class="dropdown">
			  
           <button onclick="myFunction()" class="dropbtn"><span class="glyphicon glyphicon-stats"></span>  Analysis</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="analysis1.php">Category Analysis</a>
                      <!---  <a href="#about">Analysis2</a>
                        <a href="#contact">Analysis2</a>---->
                   </div>
       </div>

      <script>
                       /* When the user clicks on the button, 
                         toggle between hiding and showing the dropdown content */
         function myFunction() {
              document.getElementById("myDropdown").classList.toggle("show");
             }

                       // Close the dropdown if the user clicks outside of it
                              window.onclick = function(event) {
                             if (!event.target.matches('.dropbtn')) {

                          var dropdowns = document.getElementsByClassName("dropdown-content");
                                   var i;
                               for (i = 0; i < dropdowns.length; i++) {
                                      var openDropdown = dropdowns[i];
                                            if (openDropdown.classList.contains('show')) {
                                                     openDropdown.classList.remove('show');
                                                       }
                                                   }
                                              }
                                      }
         </script>


      </ul>
		<br><br>
    </div>
	
 <!-----------navigation end------>
	  
	  <!---------video display--->
    <div class="col-sm-9">
		
		
      <!--recently uploaded video-->
      <h4><small>ANALYSIS</small></h4>
      <hr>
		<p>Analysis gives us a graphical representation of the data. </p>
      <p>Please choose a category from the drop down list!</p>
    </div>
  </div>
</div>

	
<footer class="container-fluid text-center">
  <p>copywrite pict</p>
</footer>

</body>
</html>


	