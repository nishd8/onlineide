
 <?php
function pyrun($code,$user)
{ 
 $myfile = fopen($user."testfile.py", "w");
 fwrite($myfile, $code);
 fclose($myfile);
 
 if(isset($_POST['check']))
	{
    $inp=$_POST['custom'];
    $fn=fopen($user."inputpy.txt", "w");
    fwrite($fn, $inp);
    fclose($fn);
    $command =('python '.$user.'testfile.py < '.$user.'inputpy.txt');
    $output = shell_exec($command." 2>&1");
    echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
    echo '<script type="text/javascript">$("#vals").html(`'.nl2br($output).'`);</script>';
    
  }
	else
	{
	  include 'conn.php';
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    $num=1;
    $flag=0;
    while($row=mysqli_fetch_assoc($run))
    {
	   $inp2=$row['tcase'];
     $fn=fopen($user."inputpy.txt", "w");
     fwrite($fn, $inp2);
     fclose($fn);
     $command =('python '.$user.'testfile.py < '.$user.'inputpy.txt');
     $output = shell_exec($command." 2>&1");
     echo "Testcase ".$num.":<br>";
     $num++;
     echo nl2br($output);
     $output=trim(preg_replace('/\s+/', '', $output));
     if ($output==$row['expop'])
     {
       $flag=1;
     }
     else
     {
       $flag=0;
     }
	  }
	  if($flag==1)
	  
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-success" role="alert">All test cases passed :)</div>\'</script>';
    }
    else
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-danger" role="alert">Wrong Answer..Test Cases Failed ;(</div>\'</script>';
    }
	}
}

function javarun($code,$user)
{ 
 $myfile = fopen($user."testfilej.java", "w");
 fwrite($myfile, $code);
 fclose($myfile);
  if(isset($_POST['check']))
  {
    $inp=$_POST['custom'];
    $fn=fopen("inputjava.txt", "w");
    fwrite($fn, $inp);
    fclose($fn);
    $command =('java '.$user.'testfilej.java < '.$user.'inputjava.txt');
    $output = shell_exec($command." 2>&1");
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
    echo '<script type="text/javascript">document.getElementById("vals").innerHTML=`'.nl2br($output).'`</script>';
  }
  else
  {
    include 'conn.php';
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    $num=1;
    $flag=0;
    while($row=mysqli_fetch_assoc($run))
    {
     $inp2=$row['tcase'];
     $fn=fopen($user."inputjava.txt", "w");
     fwrite($fn, $inp);
     fclose($fn);
     $command =('java '.$user.'testfilej.java < '.$user.'inputjava.txt');
     $output = shell_exec($command." 2>&1");
     echo nl2br($output);
     echo "Testcase ".$num.":<br>";
     $num++;
     echo nl2br($output);
     $output= trim(preg_replace('/\s+/', '', $output));
     if ($output==$row['expop'])
     {
       $flag=1;
     }
     else
     {
       $flag=0;
     }
    }
    if($flag==1)
    
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-success" role="alert">All test cases passed :)</div>\'</script>';
    }
    else
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-danger" role="alert">Wrong Answer..Test Cases Failed ;(</div>\'</script>';
    }
  }
}

function cpprun($code,$user)
{ 
 
 $myfile = fopen($user."a.cpp", "w");
 fwrite($myfile, $code);
 fclose($myfile);
  if(isset($_POST['check']))
  {
    $inp=$_POST['custom'];
    $fn=fopen($user."inputcpp.txt", "w");
    fwrite($fn, $inp);
    fclose($fn);
    $command =escapeshellcmd('g++ '.$user.'a.cpp');
    $output = shell_exec($command." 2>&1");
    $command2=$user.'a < '.$user.'inputcpp.txt';
    $output2 = shell_exec($command2." 2>&1");
    echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
    echo '<script type="text/javascript">document.getElementById("vals").innerHTML=`'.nl2br($output).'<br>'.nl2br($output2).'`</script>';
  }
  else
  {
    include 'conn.php';
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    $num=1;
    $flag=0;
    while($row=mysqli_fetch_assoc($run))
    {
     $inp2=$row['tcase'];
     $fn=fopen($user."inputcpp.txt", "w");
     fwrite($fn, $inp2);
     fclose($fn);
     $command =escapeshellcmd('g++ '.$user.'a.cpp');
     $output = shell_exec($command." 2>&1");
     $command2=$user.'a < '.$user.'inputcpp.txt';
     $output2 = shell_exec($command2." 2>&1");
     
     echo nl2br($output);
     echo nl2br($output2);
     $output2= trim(preg_replace('/\s+/', '', $output));
     if ($output2==$row['expop'])
     {
       $flag=1;
     }
     else
     {
       $flag=0;
     }
    }
    if($flag==1)
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-success" role="alert">All test cases passed :)</div>\'</script>';
    }
    else
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-danger" role="alert">Wrong Answer..Test Cases Failed ;(</div>\'</script>';
    }
  }
echo "</div>";
}

function crun($code)
{ 

 $myfile = fopen("ac.c", "w");
 fwrite($myfile, $code);
 fclose($myfile);
  if(isset($_POST['check']))
  {
    $inp=$_POST['custom'];
    $fn=fopen("inputc.txt", "w");
    fwrite($fn, $inp);
    fclose($fn);
    $command =escapeshellcmd('gcc ac.c');
    $output = shell_exec($command." 2>&1");
    $command2='ac < inputc.txt';
    $output2 = shell_exec($command2." 2>&1");
    
    echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
    echo '<script type="text/javascript">document.getElementById("vals").innerHTML=`'.nl2br($output).'<br>'.nl2br($output2).'`</script>';
  }
  else
  {
    include 'conn.php';
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    $num=1;
    $flag=0;
    while($row=mysqli_fetch_assoc($run))
    {
     $inp2=$row['tcase'];
     $fn=fopen($user."inputc.txt", "w");
     fwrite($fn, $inp2);
     fclose($fn);
     $command =escapeshellcmd('gcc '.$user.'ac.c');
     $output = shell_exec($command." 2>&1");
     $command2=$user.'ac < '.$user.'inputc.txt';
     $output2 = shell_exec($command2." 2>&1");
     
     echo nl2br($output);
     echo nl2br($output2);
     $output2= trim(preg_replace('/\s+/', '', $output));
     if ($output2==$row['expop'])
     {
       $flag=1;
     }
     else
     {
       $flag=0;
     }
    }
    if($flag==1)
    
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-success" role="alert">All test cases passed :)</div>\'</script>';
    }
    else
    {
     echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     echo '<script type="text/javascript">document.getElementById("vals").innerHTML=\'<div class="alert alert-danger" role="alert">Wrong Answer..Test Cases Failed ;(</div>\'</script>';
    }
  }
}
?>
