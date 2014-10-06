<!doctype html>
<?php
	 if (isset($_GET["data"]))
	 {
			$data = json_decode($_GET['data']);
			$fp = fopen('results/'.time().'.csv', 'w');
			foreach ($data as $fields) {
				 fputcsv($fp, $fields);
			}
			fclose($fp);
	 } 

	 if (isset($_POST["data"]))
	 {
			$data = json_decode($_POST['data']);
			$fp = fopen('results/'.time().'.csv', 'w');
			foreach ($data as $fields) {
				 fputcsv($fp, $fields);
			}
			fclose($fp);
	 } 
	 header('Location: thanks.php');
?>

