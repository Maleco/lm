<?php
	 $db = mysqli_connect('localhost', 'lm_user', 'lm_password', 'lm');
	 if(mysqli_connect_errno()) {
			echo 'Unable to connect to database [' . $db->connect_error . ']';
	 } else {
			echo 'Connection Succesful<br>';
	 }
?>
