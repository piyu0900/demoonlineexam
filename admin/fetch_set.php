<?php

 $host = 'localhost';
 $user = 'onlineexam321';
 $pass = '97tFr4;Zs-}G';
 mysql_connect($host, $user, $pass);
 mysql_select_db('onlineexam321');


//echo $find1="select * from  `admin_set` where `admin_set`.`exam_id`='".$_POST['cid']."'";
 $find=mysql_query("select * from  `admin_test` where `admin_test`.`exam_id`='".$_POST['cid']."'");
 while($row=mysql_fetch_array($find))
 {
  echo "<option value=".$row['id'].">".$row['testname']."</option>";
 }
 

?>