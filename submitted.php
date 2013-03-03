<?php
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
} else {
    include './config.inc';
    $s1 = "SELECT regno,name,topic, groupid FROM user_details WHERE username = '$_SESSION[uname]'";
    //echo $s1;
    $re1 = mysql_query($s1);
    $r1 = mysql_fetch_assoc($re1);
    $rno = $r1['regno'];
    $rname = $r1['name'];
    $rtopic =  $r1['topic'];
    $rgid = $r1['groupid'];
?>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="mainStyle.css" />
            <script type="text/javascript">
                function logout()
                {
                    document.myform.action = "logout.php";
                }
            </script>
        </head>
        <body>
            <div id="topicForm">
                <div id="msg" style="text-align: center; font-family: Nova; font-size: 25px; color: red; text-decoration: blink;"><?php echo $_GET['error']; ?></div>   
                <form  method="post" name="myform">
                    <table>
                        <tr>
                            <th colspan="2">You have already submitted the Title</th>
                        </tr>
                        <tr>
                            <td>Register Number</td>                                            
                            <td><?php echo $rno; ?></td>
                        </tr>      
                        <tr>
                            <td>Name</td>                                            
                            <td><?php echo $rname; ?></td>
                        </tr> 
                        <tr>
                            <td>Group ID</td>                                            
                            <td><?php echo $rgid; ?> &nbsp;&nbsp;&nbsp;[Note Down for Future Reference]</td>
                        </tr>  
                        <tr>
                            <td>Topic</td>                                            
                            <td><?php echo $rtopic; ?></td>
                        </tr>    
                       <tr><td>Your Group Details</td></tr>
                       <?php
                          include 'config.inc';
                          $q = "select regno, name from user_details where groupid = '$rgid'"; 
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
