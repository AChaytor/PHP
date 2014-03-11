<?php
// It is important for any file that includes this file, to have
// check_login_status.php included at its very top.
$envelope = '<img src="images/nofriendreq.jpg" width="22"  alt="Notes" title="This envelope is for logged in members">';
$loginLink = '<a href="login.php">Log In</a> &nbsp; | &nbsp; <a href="signup.php">Sign Up</a>';
if($user_ok == true) {
	$sql = "SELECT notescheck FROM users WHERE username='$log_username' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
	$notescheck = $row[0];
	$sql = "SELECT id FROM notifications WHERE username='$log_username' AND date_time > '$notescheck' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
		$envelope = '<a href="notifications.php" title="Your notifications and friend requests"><img src="images/nofriendreq.jpg"  alt="Notes"></a>';
    } else {
		$envelope = '<a href="notifications.php" title="You have new notifications"><img src="images/friendreq.jpg"  alt="Notes"></a>';
	}
    $loginLink = '<a href="user.php?u='.$log_username.'">'.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php">Log Out</a>';
}
?>
<style type="text/css">
#pageTop #pageTopWrap #pageTopRest #menu1 #nav h1 a {
	text-align: center;
}
#pageTop #pageTopWrap #pageTopRest #menu1 #nav h1 a {
	font-size: 18px;
}
#pageTop #pageTopWrap #pageTopRest #menu1 #nav h1 a {
	font-size: 36px;
	text-align: right;
}
#pageTop #pageTopWrap #pageTopRest #menu1 #nav {
	text-align: right;
}
#nav {
	text-align: center;
}
</style>
 <div id="nav"> <a href="">
        <img src="images/header.jpg" alt="logo" title="The Net Works">
        
      </a>
 <h1><a href="index.php">Home</a>  <a href="signup.php">About</a> <a href="signup.php">Contact</a>
 </h1> 

 </div>

  <div id="pageTopWrap">
    <div id="pageTopLogo">
     
    </div>
    <div id="pageTopRest">
      <div id="menu1">
     <div>
       	  <?php echo $envelope; ?> &nbsp; &nbsp; <?php echo $loginLink; ?>
        </div>
    
       
      </div>
      <div id="menu2">
       
      </div>
    </div>
  </div>
</div>