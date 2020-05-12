<?php
function pysubmit($code,$user,$tid)
{ 
 $myfile = fopen($user."testfile.py", "w");
 fwrite($myfile, $code);
 fclose($myfile);
 
include 'conn.php';
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    echo mysqli_error($conn);
    $num=1;
    $flag=0;
    $aid="";
    $t=time();
    while($row=mysqli_fetch_assoc($run))
    {
     $inp2=$row['tcase'];
     $fn=fopen($user."inputpy.txt", "w");
     fwrite($fn, $inp2);
     fclose($fn);
     $command =('python '.$user.'testfile.py < '.$user.'inputpy.txt');
     $output = shell_exec($command." 2>&1");
     echo $output;
     $output=trim(preg_replace('/\s+/', '', $output));
     if ($output==$row['expop'])
     {
       $flag=1;
       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`,`ts`) VALUES ('$tid','$user','$tnum','$aid',1,'$t')";
       $runtcev=mysqli_query($conn,$tcev);
     }
     else
     {
       $flag=0;

       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`,`ts`) VALUES ('$tid','$user','$tnum','$aid',0,'$t')";
       $runtcev=mysqli_query($conn,$tcev);
     }
    }
      if($flag==1)
      
    {
     $id="fn".uniqid();
     $fn=fopen($user."finalcode.txt", "w");
     fwrite($fn, $code);
     fclose($fn);
     $cd=$user."finalcode.txt";
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$cd',1)";
     $runev=mysqli_query($conn,$ev);
     echo mysqli_error($conn);
     echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';
     //echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     //echo '<script type="text/javascript">document.getElementById("vals").innerHTML=`<div class="alert alert-success" role="alert">All test cases passed.<br></div>`</script>';
    }
    else
    {

     $id="fn".uniqid();
     $code="";
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$code',0)";
     $runev=mysqli_query($conn,$ev);
     echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';
     //echo '<script type="text/javascript">$("#myModal").modal("show")</script>';
     //echo '<script type="text/javascript">document.getElementById("vals").innerHTML=`<div class="alert alert-danger" role="alert">Wrong Answer..Test Cases Failed ;(</div>`</script>';
    }
}

function javasubmit($code,$user,$tid)
{ 
 $myfile = fopen($user."testfilej.java", "w");
 fwrite($myfile, $code);
 fclose($myfile);
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    $num=1;
    $flag=0;
    $t=time();
    while($row=mysqli_fetch_assoc($run))
    {
     $inp2=$row['tcase'];
     $fn=fopen($user."inputjava.txt", "w");
     fwrite($fn, $inp);
     fclose($fn);
     $command =('java '.$user.'testfilej.java < '.$user.'inputjava.txt');
     $output = shell_exec($command." 2>&1");
     $output= trim(preg_replace('/\s+/', '', $output));
     if ($output==$row['expop'])
     {

       $flag=1;
       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`) VALUES ('$tid','$user','$tnum','$aid',1)";
       $runtcev=mysqli_query($conn,$tcev);
     }
     else
     {
       $flag=0;

       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`) VALUES ('$tid','$user','$tnum','$aid',0)";
       $runtcev=mysqli_query($conn,$tcev);
     }
    }
      if($flag==1)
      
    {
     $id="fn".uniqid();
     $fn=fopen($user."finalcode.txt", "w");
     fwrite($fn, $code);
     fclose($fn);
     $cd=$user."finalcode.txt";
     
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$cd',1)";
     $runev=mysqli_query($conn,$ev);
     echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';
    }
    else
    {

     $id="fn".uniqid();
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$code',0)";
     $runev=mysqli_query($conn,$ev);
     echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';
    }
}

function cppsubmit($code,$user,$tid)
{ 
 
 $myfile = fopen($user."a.cpp", "w");
 fwrite($myfile, $code);
 fclose($myfile);
  
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    $num=1;
    $flag=0;
    $t=time();
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
     if ($outpu2t==$row['expop'])
     {

       $flag=1;
       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`) VALUES ('$tid','$user','$tnum','$aid',1)";
       $runtcev=mysqli_query($conn,$tcev);
     }
     else
     {
       $flag=0;

       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`) VALUES ('$tid','$user','$tnum','$aid',0)";
       $runtcev=mysqli_query($conn,$tcev);
     }
    }
      if($flag==1)
      
    {
     $id="fn".uniqid();
     $fn=fopen($user."finalcode.txt", "w");
     fwrite($fn, $code);
     fclose($fn);
     $cd=$user."finalcode.txt";
     
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$cd',1)";
     $runev=mysqli_query($conn,$ev);
          echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';
    }
    else
    {

     $id="fn".uniqid();
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$code',0)";
     $runev=mysqli_query($conn,$ev);
          echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';
    }
}

function csubmit($code,$user,$tid)
{ 

 $myfile = fopen($user."ac.c", "w");
 fwrite($myfile, $code);
 fclose($myfile);
    include 'conn.php';
    $q="SELECT * FROM testcase where test_id=1";
    $run=mysqli_query($conn,$q);
    $num=1;
    $flag=0;
    $t=time();
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
     if ($outpu2t==$row['expop'])
     {

       $flag=1;
       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`) VALUES ('$tid','$user','$tnum','$aid',1)";
       $runtcev=mysqli_query($conn,$tcev);
     }
     else
     {
       $flag=0;

       $tnum=$row['number'];
       $aid=uniqid();
       $tcev="INSERT INTO `testcase_wise_asessment`(`test_id`, `user`, `tcase_num`, `as_id`, `success`) VALUES ('$tid','$user','$tnum','$aid',0)";
       $runtcev=mysqli_query($conn,$tcev);
     }
    }
      if($flag==1)
      
    {
     $id="fn".uniqid();
     $fn=fopen($user."finalcode.txt", "w");
     fwrite($fn, $code);
     fclose($fn);
     $cd=$user."finalcode.txt";
     
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$cd',1)";
     $runev=mysqli_query($conn,$ev);
          echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';

    }
    else
    {

     $id="fn".uniqid();
     $ev="INSERT INTO `final_assessment`(`as_id`, `user`, `code`, `success`) VALUES ('$id','$user','$code',0)";
     $runev=mysqli_query($conn,$ev);
     echo '<script type="text/javascript">location.replace("result.php?id='.$t.'")</script>';

    }
  
}
?>
