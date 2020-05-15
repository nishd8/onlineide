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

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php include 'list-style.php' ?>
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
      <div class="col-lg-4 offset-lg-4 md-12 sm-12 edit">
      <div class="table-responsive">
      <table class="table table-striped">
        <tr><th>Name</th><th>ID</th></tr>
        <?php
         $q="SELECT test_id,name FROM question";
         $run=mysqli_query($conn,$q);
         while($row=mysqli_fetch_assoc($run))
         {
          echo "<tr><td>".$row['name']."</td><td>".$row['test_id']."</td><td><a href='editor.php?tid=".$row['test_id']."' class='submitbutton'>Submit Solution</a></td></tr>";
         }

        ?>
      </table>
      </div>
      </div>
  </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>

<?php
?>  

