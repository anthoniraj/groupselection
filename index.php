<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['uname'])) {
    header('Location: selection.php');
}
else
{    
 loginDisplay();
} 
function loginDisplay()
{
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Design Topic and Group Selection</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div id="container" >
            <form method="post" action="loginProcess.php">
             <div id="msg" style="text-align: center; font-family: Nova; font-size: 25px; color: red; text-decoration: blink;"><?php echo $_GET['error'];?></div>   
            <h1>Web Design Topic Selection</h1>
            <div id="ins">
                <h3>Instructions to Students</h3>
                <ul>
                    <li>You can use the IWP Moodle Username and Password Details</li>
                    <li>Read the Description of Title Before Submitting</li>
                    <li>Resubmission is not allowed</li>
                    <li>Your Group will be announced after the deadline</li>
                    <li>Any Queries Contact Your Course Instructor - Prof. Anthoniraj A</li>
                </ul>
            </div>    

            <label>Username</label>
            <input type="text" name="name" required  title="Your IWP Moodle Username"/>

            <label>Password</label>
            <input type="password" name="pwd" title ="Your IWP Moodle password" required/>

            <button type="submit">Login</button>  
            
            <footer>Developed By Prof. Anthoniraj Amalanathan</footer>
            </form>
        </div>
    </body>
</html>
<?php
}
?>