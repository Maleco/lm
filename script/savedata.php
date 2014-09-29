<?php

	 // Include the database info
	 include ('database_connect.php');

	 function mysql_insert($table, $inserts)
	 {
			$values = array_map('mysql_real_escape_string', array_values($inserts));
			$keys = array_keys($inserts);

			return mysql_query('
			INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) 
			VALUES (\''.implode('\',\'', $values).'\')
			'); 
	 }

	 // Get the table name
	 $table = $_POST['table'];

	 // decode the data object from json
	 $trials_obj = json_decode($_POST['json']);

	 // Get the optional database (as array)
	 $opt_data = json_decode($_POST['opt_data'], true);
	 $opt_data_names = array_keys($opt_data);

	 // Run through the data and insert into trials array_map
	 $trials = $trials_obj[0];

	 for($i=1; $i<count($trials_obj); $i++)
	 {
			if(count($trials_obj[$i] > 0)) {
				 // If there is data, merge into $trials 
				 $trials = array_merge($trials, $trials_obj[$i]);
			}
	 }
//	 var_dump($trials);

	 // For each element in the trials array, insert the row into the mysql table
	 for($i=0; $i<count($trials);$i++)
	 {
			$to_insert = (array)($trials[$i]);
			// Add the optional data 
			for($j=0;$j<count($opt_data_names);$j++)
			{
				 $to_insert[$opt_data_names[$j]] = $opt_data[$opt_data_names[$j]];
			}
			$result = mysql_insert($table, $to_insert);
	 }

	 // Validate the insert 
	 if (!$result) {
			die('Invalid query: ' . mysql_error() );
	 } else { 
			print "Succesful insert";
	 }
?>

