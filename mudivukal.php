<?php
include './config.inc';
$sql = "SELECT regno, name, topic, groupid FROM user_details where groupid not like '0' order by groupid";
$result = mysql_query($sql);

echo '<head><link rel="stylesheet" type="text/css" href="result.css" /></head>';
echo "<table><tr><th>S.No</th><th>Reg No</th><th>Name</th><th>Topic</th><th>Group ID</th></tr>";
$c = 1;
while ($row = mysql_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>$c</td>";
    echo "<td>$row[regno]</td>";
    echo "<td>$row[name]</td>";
    echo "<td>$row[topic]</td>";
    echo "<td>$row[groupid]</td>";
    echo "</tr>";  
    $c = $c + 1;	
}
echo '</table>'
?>
