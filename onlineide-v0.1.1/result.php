<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
</head>
<body>
<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <?php include 'form-style.php'?>

    <style type="text/css">
   	 	.CodeMirror {
  font-family: "Poppins";
   letter-spacing: 3px;

  line-height: 1.5em;
  font-size: 1em;
  height: 750px;
  border:2px solid;
  border-radius: 5px;
  box-shadow: 10px 10px 5px #d5d5d5;

  }
  .edit{
  	padding: 10px;


  }
  .runbutton
  {
  	background-color:#464646;
  	color: #fff;
  	box-shadow: 5px 5px 10px #d5d5d5;
  	padding: 8px;
  	border-radius: 5px;
  	border:2px solid #464646;
  	font-size: 15px;
  	width:100px;

  }
  .submitbutton
  {
  	background-color:#00e200;
  	color: #464646;
  	box-shadow: 5px 5px 10px #d5d5d5;
  	padding: 8px;
  	border-radius: 5px;
  	border:2px solid #00e200;
  	font-size: 15px;
  	font-weight: 30px;
  	width:135px;

  }

  body
  {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f5f5;
  }
  .output-div
  {
    color: #464646;
    background-color: white;
    padding:30px;
    font-size: 20px;
  }
  .question
  {
  	overflow-y:scroll;
  	height:750px;
  	padding:30px;
  }
   </style>

</head>
<body>
     <nav class="navbar navbar-dark bg-dark">
     	<a href="#" class="navbar-brand">PS-Code Arena</a>
     	 <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <form method="post">
        <button  type="submit" name='lgt' style="border:2px solid #d5d5d5; background-color: transparent;color: #d5d5d5;">Logout</button>
        </form>
      </li>
   </ul>
     </nav>
	<div class="container-fluid">
     <div class="row">       
      <div class="col-lg-6 offset-lg-3 md-12 sm-12 edit">
      	<div class="output-div">
      	
       <?php
              include 'conn.php';
               $email=$_SESSION['user_email'];
               $name=$_SESSION['user_name'];
               $pass=$_SESSION['user_pass'];
               $t=$_GET['id'];
               $q="SELECT * FROM `testcase_wise_asessment` WHERE ts='$t' and user='$email'";
               $run=mysqli_query($conn,$q);
		$num=mysqli_num_rows($run);                    
 		$c=0;               
		while($row=mysqli_fetch_assoc($run))
               {
               	
               	if($row['success']==1)
               	{
               	  $c++;
               	}
               	else
               	{
                   
               	}
               	
               }
if($c==$num)
{
echo '<div class="alert alert-success" role="alert">
  All Test Cases Passed
</div>';

}
else if($c<$num && $c>0)
{
 echo '
<div class="alert alert-warning" role="alert">
 Partially Correct, '.$c.'/'.$num.' cases passed
</div>';
}
else
{
echo '<div class="alert alert-danger" role="alert">
 0  test cases passed. 
</div>';

}


?>

</div>
    </div>
  </div>
</div>
	
</body>
</html>

<?php
if (isset($_POST['lgt'])) 
 {
  session_destroy();
  echo "<script type='text/javascript'>location.replace('index.php')</script>";
 }

?>