<?php
session_start();
include('config.inc');
$user = $_POST['name'];
$pwd = $_POST['pwd'];
$psalt = '+12123f4%yfp3';
// Include database connection settings

$query = "SELECT * FROM user_details WHERE username = '$user' and password = MD5(CONCAT('$pwd', '$psalt'))";

//echo $query;
// Retrieve username and password from database according to user's input
$login = mysql_query($query);

// Check username and password match
if (mysql_num_rows($login) == 1) 
{
// Set username session variable
    $row = mysql_fetch_assoc($login);
    $id = $row['groupid'];
    $_SESSION['uname'] = $user;
    $_SESSION['fname'] = $row['name'];
    // Jump to secured page
    if($id !=0)
    {
        header('Location: submitted.php');
    }
    else
    {
        header('Location: selection.php');
    }    
} 
else
{
    header('Location: index.php?error=Invalid User Details');

}
?>
