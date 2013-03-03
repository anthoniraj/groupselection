<?php

// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
} 
else 
{
 $topic = $_POST['topic'];
 include './config.inc';
 $sql = "SELECT groupid, count FROM availability WHERE topic = '$topic'";
 $result = mysql_query($sql);
 $row = mysql_fetch_assoc($result);
 $count = $row['count'];
 $groupid = $row['groupid'];  
 
 $s = "SELECT groupid FROM user_details WHERE username = '$_SESSION[uname]'";
 
 $re = mysql_query($s);
 $r = mysql_fetch_assoc($re);
 $gid = $r['groupid'];
 //echo $s. " ".$gid ;
 if($gid !=0)
 {
       header('Location: submitted.php');
 }   
 else if ($count < 5 ) 
 {
    $count = $count + 1;
    $sql1 = "update availability set count = $count where topic = '$topic'";
    $result1 = mysql_query($sql1);

    $_SESSION['topic'] = $topic;
    $_SESSION['groupid'] = $groupid;
 
    $sql2 = "update user_details set topic='$topic', groupid='$groupid' where username='$_SESSION[uname]'";
    //echo $sql2;
    $result2 = mysql_query($sql2);
    
    if($result1 == true && $result2 == true)
    {
        resultPage();
    }
            
   }
 else 
 {
       header('Location: selection.php');
 }
  
}  
function resultPage(){
?>

<html>
    <head>
     <link rel="stylesheet" type="text/css" href="mainStyle.css" />
     <script type="text/javascript">
         function logout()
         {
             document.myform.action= "logout.php";
         }
     </script>
    </head>
    <body>
        <div id="topicForm">
            <div id="msg" style="text-align: center; font-family: Nova; font-size: 25px; color: red; text-decoration: blink;"><?php echo $_GET['error'];?></div>   
            <form  method="post" name="myform">
                <table>
                    <tr>
                            <th colspan="2">You Title has been Submitted ... </th>
                    </tr>
                   <tr>
                       <td>Register Number</td>                                            
                       <td><?php echo strtoupper($_SESSION['uname']); ?></td>
                    </tr>      
                    <tr>
                       <td>Name</td>                                            
                       <td><?php echo $_SESSION['fname']; ?></td>
                    </tr> 
                    <tr>
                       <td>Group ID</td>                                            
                       <td><?php echo $_SESSION['groupid']; ?> &nbsp;&nbsp;&nbsp;[Note Down for Future Reference]</td>
                    </tr>  
                    <tr>
                       <td>Topic</td>                                            
                       <td><?php echo $_SESSION['topic']; ?></td>
                    </tr>    
					<tr><td>Your Group Details</td></tr>
                       <?php
                          include 'config.inc';
                          $q = "select regno, name from user_details where groupid = '$_SESSION[groupid]'"; 
                          $r = mysql_query($q);
                          echo "<tr><td><b>";
                          while($row = mysql_fetch_assoc($r))
                          {
                            echo $row['regno']." - " . $row['name'] . "<br />";

                          }
                         echo "</b></td></tr>";
                       ?>

                    <tr>
                        <td colspan="2">
                            <button type="submit" onclick="logout();">Logout</button> 
                        </td>                        
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
<?php
}
?>
