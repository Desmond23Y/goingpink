<?php
include('navi_bar.php');
include('conn.php');
?>

<html>
<head>
    <title>Going Pink | View Profile</title>
    <link rel="stylesheet" href="profile_styles.css">
</head>
<body>
    <header>
        <h1>View Profile</h1>
    </header>

    <form class="horizontal" id="view_profile" action="" method="post" onsubmit="return superFancy(event)">
<fieldset>

<legend>Profile Information3</legend>


<div class="form-group">
  <label class="col-md-4 control-label" for="user_name">Username</label>
  <div class="col-md-4">
  <input id="user_name" name="user_name" type="text" value="<?=$row['user_name']?>" class="form-control input-md" disabled>
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="user_email">Email Address</label>
  <div class="col-md-5">
  <input id="user_email" name="user_email" type="text" value="<?=$row['user_email']?>" class="form-control input-md" disabled>
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Incorrect?</label>
  <div class="col-md-4">
    <button id="modify" name="modify" class="btn btn-primary" >Modify</button>
  </div>
</div>

</fieldset>
</form>

</body>
</html>
