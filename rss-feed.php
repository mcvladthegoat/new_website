<?php
  //RSS Parser
  include_once("moderncms/conf.php");
  $link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD);
  mysql_select_db(SQLDB, $link);
  $day = date("Y-m-d");
  $rssparser = mysql_query("SELECT `site_addr` from rssparser WHERE website='$serveraddr_var' AND status = 'yes'", $link);
  if(mysql_num_rows($rssparser)){
    while($out = mysql_fetch_array($rssparser)){
      $i = 0;
      $obj = simplexml_load_string(file_get_contents($out["site_addr"]));
      echo "<h2><font color=blue>".$out["site_addr"]."</font></h2><br>";
      while($obj->channel->item[$i]->title != ""){
        echo "<h3>".$obj->channel->item[$i]->title."</h3>";
        echo "<p>".$obj->channel->item[$i]->description."</p><br>";
        $title = $obj->channel->item[$i]->title;
        $indoor = $obj->channel->item[$i]->description;
        $check = mysql_query("SELECT * from news WHERE content = '$indoor' AND website = '$serveraddr_var'", $link);
        if(mysql_num_rows($check) == ""){
          $inserter = mysql_query("INSERT INTO news VALUES('','$title', '$indoor', '','$day', '', '$serveraddr_var')", $link);
          echo "OK!";
      }
      $i++;
      }
    }
  }
?>