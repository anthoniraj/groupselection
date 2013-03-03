<?php

 $q = $_GET["q"];

 include './config.inc';

 $sql = "SELECT description,count FROM availability WHERE topic = '$q'";

 $result = mysql_query($sql);

 $row = mysql_fetch_assoc($result);

 
 $count = $row['count'];
 $description = $row['description'];
 echo $count . "@" .$description;
 
 ?>