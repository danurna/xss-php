<?php
  include('dbconnect.php');
  $sql = "SELECT name, comment FROM guestbookA";
  $result = $db->query($sql);

  if ($result) {
    while ($row = $result->fetch_object()) {
      print "<div class='col-lg-6'>";
      print "<h4>" . $row->name . "</h4>";
      print "<p>" . $row->comment . "</p>";
      print "</div>";
    }
    mysql_free_result($result);
  }
?>