<?php
  include('dbconnect.php');
  $submit = $_POST['submit'];
  if ($submit == 'create') {
    $name    = htmlspecialchars($_POST[name]);    
    $comment = htmlspecialchars($_POST[comment]);     
    $query   = "INSERT INTO guestbookB VALUES (NULL, '$name' ,'$comment')" ;         
    $result = $db->query($query);
    if (!$result) {
      print "Fehler. Der folgende Eintrag konnte nicht angelegt werden:";
      print "<div class='col-lg-6'>";
      print "<h4>" . $name . "</h4>";
      print "<p>" . $comment . "</p>";
      print "</div>";
    } else {
      print "Ihr Kommentar wurde erfolgreich ins Gästebuch eingetragen. Sie werden in Kürze weitergeleitet!";
      ?> 
      <script language="javascript" type="text/javascript">
      window.setTimeout('window.location = "index.php"',2000);
      </script>
      <?php
    }
  } else {
    ?>
    <form method="post" action="jumbotron-add.php">
      <input type="text" id="inputName" class="form-control" placeholder="Name"  name="name" size="30" maxlenght="30">
      <textarea name="comment" placeholder="Kommentar" cols="50" rows="10" class="form-control"></textarea>
      <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="create">Eintrag erstellen</button>
    </form>
    <?php 
  }
?>