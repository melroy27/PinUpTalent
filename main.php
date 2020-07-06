<?php
   echo '
   <html>
   <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="dashstyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
   <title>PinUp Talent</title>
   </head>
   <body>
<form>
If you are User select 
<input type="radio" name="portion_selection" value="button_one"/>
If you are Company select 
<input type="radio" name="portion_selection" value="button_two"/>
  <div id="portion_one" style="display:none">
        <form action="../includes/login.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username/Email" required><br>
            <input type="password" name="pwd" placeholder="Password" required><br>
            <button type="submit" name="submit">LOGIN </button>
      </form>
  </div>
  <div id="portion_two" style="display:none">
        <form action="../includes/login.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username/Email" required><br>
            <input type="password" name="pwd" placeholder="Password" required><br>
            <button type="submit" name="submit">LOGIN</button>
      </form>
  </div>
</form>
</body>

</html>';
?>
<script type="text/javascript">
  $("input[name='portion_selection']:radio")
    .change(function() {
      $("#portion_one").toggle($(this).val() == "button_one");
      $("#portion_two").toggle($(this).val() == "button_two"); });
</script>
