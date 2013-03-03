<?php
// Inialize session
session_start();


// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}
else
{
    include './config.inc';
    $sql = "SELECT groupid FROM user_details WHERE username = '$_SESSION[uname]'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $groupid = $row['groupid'];
    if($groupid == 0)
    {
       securePage();
    }
    else
    {
       header('Location: submitted.php');
    }   
}    
function securePage(){
?>

<html>
    <head>
        <script type="text/javascript">
            function chackAvailability(str)
            {
                if (str === "")
                {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
                    {
                        var text = xmlhttp.responseText;
                        var res = text.split("@");
                        
                        if(res[0] < 5)
                            {
                                document.getElementById("avail").style.color = "#3E9800"
                                document.getElementById("avail").innerHTML = "This Topic is Available";
                            }
                           else
                            {
                                document.getElementById("avail").style.color = "#BE1A1A"
                                document.getElementById("avail").innerHTML = "This Topic is Not Available";
                            }   
                        
                        
                        document.getElementById("desc").innerHTML = res[1];
                    }
                };
                xmlhttp.open("GET", "getcount.php?q=" + str, true);
                xmlhttp.send();
            }
            function check()
            {
                var val = document.getElementById('topic').value;                
                if(val == 0)
                    {
                        alert("Choose Proper Topic ...");
                    }
                 else
                   {
                       document.myform.action ="process.php";
                   }  
            }

        </script>
        <link rel="stylesheet" type="text/css" href="mainStyle.css" />

    </head>
    <body>
        <div id="topicForm">
            <div id="msg" style="text-align: center; font-family: Nova; font-size: 25px; color: red; text-decoration: blink;"><?php echo $_GET['error'];?></div>   
            <form  method="post" name="myform">
                <table>
                   <tr>
                       <td>Name: <?php echo $_SESSION['fname'] ?></td>
                        <td>Reg No: <?php echo strtoupper($_SESSION['uname']);?></td>

                    </tr>
                    <tr>
                        <th>Select Your Topic</th>
                        <th>Availability</th>

                    </tr>
                    <tr>

                        <td>
                            <select id="topic" name="topic" onchange="chackAvailability(this.value);">
                                <option value="0">Choose Your Topic</option>    
                                <option value="Web Page Template for Orphanage">Web Page Template for Orphanage</option>
                                <option value="Agriculture or Farmer Online Customer Care">Agriculture or Farmer Online Customer Care</option>
                                <option value="Emergency Help System">Emergency Help System</option>
                                <option value="Students Club Management System">Students Club Management System</option>
                                <option value="IRCTC Simple User Interface Design">IRCTC Simple User Interface Design</option>
                                <option value="VIT University Website">VIT University Website</option>
                                <option value="SCSE Website">SCSE Website</option>
                                <option value="National Portal of India">National Portal of India</option>
                                <option value="India Map Customization">India Map Customization</option>
                                <option value="Sports in India">Sports in India</option>
                                <option value="History of India">History of India</option>
                                <option value="Tobacco and Cancer Awareness Website">Tobacco and Cancer Awareness Website</option>
                                <option value="Family tree or pedigree chart Website">Family tree or pedigree chart Website</option>
                                <option value="E-Learning in School Level Students">E-Learning in School Level Students</option>
                                <option value="Yellow Pages India">Yellow Pages India</option>  
                                <option value="Health Care Systems">Health Care Systems</option>
                                <option value="Issue Management System">Issue Management System</option>
                                <option value="Web Page Design with Accessibility">Web Page Design with Accessibility</option>
                                <option value="Parents Counseling System">Parents Counseling System</option>
                                <option value="The Juvenile Justice (Care and Protection of Children)">The Juvenile Justice (Care and Protection of Children)</option>
                                <option value="Indian Education System">Indian Education System</option>
                                <option value="Knowledge Sharing Among Teachers">Knowledge Sharing Among Teachers</option>
                                <option value="Women Empowerment">Women Empowerment</option>
                                <option value="Geriatric Care Management">Geriatric Care Management</option>
                                <option value="Poverty in India">Poverty in India</option>
                                <option value="Behavioral Problems In School Aged Children">Behavioral Problems In School Aged Children</option>
                                <option value="Waste Management System (Recycle)">Waste Management System (Recycle)</option>
                                <option value="Prevention and Control of Environmental Pollution">Prevention and Control of Environmental Pollution</option>                    
                            </select>
                        </td>
                        <td>
                            <div id="avail">
                                Availability
                            </div>   
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p id="desc">
                                Description
                            </p>  
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" onclick="check();">Submit Topic</button> 
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
<?
}
?>