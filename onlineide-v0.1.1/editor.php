<?php session_start()?>
<?php
              include 'conn.php';
               $email=$_SESSION['user_email'];
               $name=$_SESSION['user_name'];
               $pass=$_SESSION['user_pass'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online IDE</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://rawcdn.githack.com/justnishad/cdn/8120bffca02b7c7dbd3e0e740dffd34f76e51b9b/codemirror.css">
	<link rel="stylesheet" href="https://rawcdn.githack.com/justnishad/cdn/8120bffca02b7c7dbd3e0e740dffd34f76e51b9b/dracula.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
   <script src="https://rawcdn.githack.com/justnishad/cdn/8120bffca02b7c7dbd3e0e740dffd34f76e51b9b/codemirror.js"></script>
   <script src="https://rawcdn.githack.com/justnishad/cdn/8120bffca02b7c7dbd3e0e740dffd34f76e51b9b/clike.js"></script>
   <script src="https://rawcdn.githack.com/justnishad/cdn/8120bffca02b7c7dbd3e0e740dffd34f76e51b9b/python.js"></script>
  
   <script src="https://rawcdn.githack.com/justnishad/cdn/8120bffca02b7c7dbd3e0e740dffd34f76e51b9b/active-line.js"></script>
   <script src="https://rawcdn.githack.com/justnishad/cdn/8120bffca02b7c7dbd3e0e740dffd34f76e51b9b/closebrackets.js"></script>
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

      <div class="col-lg-6 md-12 sm-12">
      	<div class="container-fluid edit">
      		<h1>Question</h1>
      		<div class="question">
      		<?php
      		include 'conn.php';
      		$q="SELECT * FROM question where test_id=1";
      		$r=mysqli_query($conn,$q);
      		while($row=mysqli_fetch_assoc($r))
      		{
                     $tid=$row['test_id'];
      			echo nl2br($row['question']);
      		}
      		/*$fn=fopen('question.txt', 'r');
      		 while(! feof($fn))  
            {

	            $result = fgets($fn);
	            $s=nl2br($result);
      		    echo $s;
      		}*/
      		?>
      	</div>
       	</div>
      </div>
     <div class="col-lg-6 md-12 sm-12">
       <div class="container-fluid edit">
       	<form method="POST" action="editor.php">
       
       <label>Select Language</label>&nbsp;&nbsp;&nbsp;
	    <select name="lang" id="select" onchange="selectLang()">
		 <option value="text/x-csrc">C</option>
		 <option value="text/x-c++src">C++</option>
		 <option value="text/x-java">Java</option>
		 <option value="python">Python</option>
	   </select><br><br>
	   <textarea id="editor" name='code' class="CodeMirror"><?php if(isset($_POST['code'])) { 
         echo htmlentities ($_POST['code']); }else{
          echo "code here...";}?></textarea><br><br>
	   <textarea name="custom" placeholder="input" id="cst" disabled hidden></textarea>&nbsp;&nbsp;
	   <label>Custom Input</label>&nbsp;&nbsp;<input type="checkbox" id="check" name='check' ><br><br>
	   <a href="#op"> <button class="runbutton" name="run" type="submit">Run</button></a>&nbsp;&nbsp;
	 <button class="submitbutton" type="submit" name="sb">Submit</button>
	  </form>
       <br><br>
       <script type="text/javascript">
	      document.getElementById('check').onchange = function() {
          document.getElementById('cst').disabled = !this.checked;
          document.getElementById('cst').hidden = !this.checked;;
         };
      </script>
       </div>
       
     <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Result/Output</h4>
      </div>
      <div class="modal-body">
       <span id="vals"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	
      	<?php
      	 include 'compilers.php';
          if(isset($_POST['run']))
          {
          	$lang=$_POST['lang'];
	        $code=$_POST['code'];
	        if($lang=="python")
	        {
	         pyrun($code,$email);	
	        }
	        else if($lang=="text/x-java")
	        {
	         javarun($code,$email);	
	        }
	        else if($lang=="text/x-c++src")
	        {
	         cpprun($code,$email);
	        }
	        
	        else if($lang=="text/x-csrc")
	        {
	         cpprun($code);
	        }
            echo '<script type="text/javascript">document.getElementById("select").value = "'.$lang.'";</script>';
          }
	      ?> 
<?php
         include 'compiler-submit.php';
          if(isset($_POST['sb']))
          {
            $lang=$_POST['lang'];
          $code=$_POST['code'];
          if($lang=="python")
          {
           pysubmit($code,$email,$tid); 
          }
          else if($lang=="text/x-java")
          {
           javasubmit($code,$email,$tid); 
          }
          else if($lang=="text/x-c++src")
          {
           cppsubmit($code,$email,$tid);
          }
          
          else if($lang=="text/x-csrc")
          {
           csubmit($code,$email,$tid);
          }
            echo '<script type="text/javascript">document.getElementById("select").value = "'.$lang.'";</script>';
          }
        ?>

      </div>
      </div> 

   </div>
	<script src="editor.js"></script>
	
</body>
</html>

<?php
if (isset($_POST['lgt'])) 
 {
  session_destroy();
  echo "<script type='text/javascript'>location.replace('index.php')</script>";
 }

?>