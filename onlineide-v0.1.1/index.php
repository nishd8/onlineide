<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Online IDE</title>
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
     </nav>
	<div class="container-fluid">
     <div class="row">

      <div class="col-lg-6 offset-lg-3 md-12 sm-12">
        <div class="forms">
        <ul class="tab-group">
         <li class="tab active"><a href="#login">Log In</a></li>
         <li class="tab"><a href="#signup">Sign Up</a></li>
        </ul>
          <form action="index.php" id="login" method="post">
          <h1>Login</h1>
          <div class="input-field">
            <label for="email">Email</label>
            <input type="email" name="email" required="email" />
            <label for="password">Password</label> 
            <input type="password" name="password" required/>
            <input type="submit" value="Login" class="button" name="lg" />
            <p class="text-p"> <a href="#">Forgot password?</a> </p>
          </div>
      </form>
      <form action="index.php" id="signup" method="post">
          <h1>Sign Up</h1>
          <div class="input-field">
            <label for="Name">Name</label> 
            <input type="text" name="name" required/>
            <label for="email">Email</label> 
            <input type="email" name="email" required="email"/>
            <label for="password">Password</label> 
            <input type="password" name="password" required/>
            <input type="submit" value="Sign up" class="button" name="su" />
          </div>
      </form>
     </div>
    </div>
  </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.tab a').on('click', function (e) {
    e.preventDefault();
    
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    
    var href = $(this).attr('href');
    $('.forms > form').hide();
    $(href).fadeIn(500);
  });
});
</script>

	
</body>
</html>

<?php
include 'conn.php';
if(isset($_POST['lg']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $login="SELECT * FROM user WHERE (email='$email' AND pass='$password')";
  if($run2=mysqli_query($conn,$login))
  {
      $num=mysqli_num_rows($run2);
      if($num==1)
      {
        $row=mysqli_fetch_assoc($run2);
        $_SESSION['user_email']=$email;
        $_SESSION['user_pass']=$password;
        $_SESSION['user_name']=$row['name'];
        echo "<script type='text/javascript'>location.replace('editor.php')</script>";
       
      }
    }

}

if(isset($_POST['su']))
{

  $uname=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  
  $signup="INSERT INTO user (name, email, pass) VALUES ('$uname','$email','$password')";
  if($run=mysqli_query($conn,$signup))
  {

      //echo '<script type="text/javascript">alert("Done. Please Login.")</script>';
        $_SESSION['user_email']=$email;
        $_SESSION['user_pass']=$password;
        $_SESSION['user_name']=$uname;
        echo "<script type='text/javascript'>location.replace('editor.php')</script>";
       
    
  }
  else
  {
    echo '<script type="text/javascript">alert("Not Done. Please Try Again.")</script>';
    
  }
}
?>	

